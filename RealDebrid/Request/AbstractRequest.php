<?php

namespace RealDebrid\Request;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
use RealDebrid\Auth\Token;
use RealDebrid\Exception\ExceptionStatusCodeFactory;
use RealDebrid\Interfaces\ResponseHandler;
use RealDebrid\Response\Handlers\DefaultResponseHandler;

/**
 * Class AbstractRequest
 *
 * @package RealDebrid\Request
 * @author Valentin GOT
 * @abstract
 */
abstract class AbstractRequest {

    /**
     * @var Token
     */
    private $token = null;

    /**
     * @var ResponseHandler
     */
    private $responseHandler;

    protected $queryParams = array();

    abstract public function getRequestType();
    abstract public function getUri();

    public function __construct() {
        $this->setResponseHandler(new DefaultResponseHandler());
    }

    public function make(ClientInterface $client, ResponseHandler $responseHandler = null) {
        $this->setResponseHandler($responseHandler);

        try {
            return $this->handleResponse($this->request($client), $client);
        } catch(ClientException $e) {
            if ($e->getRequest()->getMethod() !== RequestType::DELETE && json_decode($e->getResponse()->getBody())->error_code != 7)
                throw ExceptionStatusCodeFactory::create($e->getResponse());
        }

        return null;
    }

    public function getUrl() {
        return UriBuilder::format($this);
    }

    public function setToken(Token $token = null) {
        $this->token = $token;
    }

    public function setResponseHandler(ResponseHandler $responseHandler = null) {
        if ($responseHandler)
            $this->responseHandler = $responseHandler;
    }

    public function getResponseHandler() {
        return $this->responseHandler;
    }

    public function getQueryParams() {
        return $this->queryParams;
    }

    protected function handleResponse(ResponseInterface $response, ClientInterface $client) {
        $handler = $this->getResponseHandler();
        $handler->setToken($this->token);

        return $handler->handle($response, $client);
    }

    private function request(ClientInterface $client) {
        return $client->request($this->getRequestType(), $this->getUrl(), $this->getOptions());
    }

    private function getOptions() {
        $options = array(
           "headers" => $this->getHeaders()
        );

        if ($this->needsPostBody())
            $options['body'] = json_encode($this->getPostBody());

        return $options;
    }

    private function getHeaders() {
        return array(
            "Content-Type" => "application/json",
            'Authorization' => (is_null($this->token)) ? "" : "Bearer " . $this->token,
        );
    }

    private function needsPostBody() {
        return in_array($this->getRequestType(), array(RequestType::POST, RequestType::PUT));
    }

    private function getPostBody() {
        return array();
    }
}