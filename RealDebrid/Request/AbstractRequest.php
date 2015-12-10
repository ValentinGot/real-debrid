<?php

namespace RealDebrid\Request;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Collection;
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
     * @var Collection
     */
    protected $body;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var Collection
     */
    protected $queryParams;

    /**
     * @var Token
     */
    private $token = null;

    /**
     * @var ResponseHandler
     */
    private $responseHandler;

    /**
     * Retrieve the HTTP verb
     *
     * @return string HTTP verb
     */
    abstract public function getRequestType();

    /**
     * Retrieve the URI
     *
     * @return string URI
     */
    abstract public function getUri();

    /**
     * AbstractRequest constructor.
     */
    public function __construct() {
        $this->body = new Collection();
        $this->queryParams = new Collection();

        $this->setResponseHandler(new DefaultResponseHandler());
    }

    /**
     * Make the API request and handle the response before returning it
     *
     * @param ClientInterface $client Client interface for sending HTTP requests
     * @param ResponseHandler|null $responseHandler Override the default response handler with one of your own
     * @return mixed|null The handled response
     * @throws \RealDebrid\Exception\ActionAlreadyDoneException
     * @throws \RealDebrid\Exception\BadRequestException
     * @throws \RealDebrid\Exception\BadTokenException
     * @throws \RealDebrid\Exception\PermissionDeniedException
     * @throws \RealDebrid\Exception\RealDebridException
     * @throws \RealDebrid\Exception\UnknownResourceException
     */
    public function make(ClientInterface $client, ResponseHandler $responseHandler = null) {
        $this->setResponseHandler($responseHandler);

        try {
            return $this->handleResponse($this->request($client), $client);
        } catch(ClientException $e) {
            // HACK for /downloads/delete/{id} URL which is throwing an error_code 7 even if it works
            if ($e->getRequest()->getMethod() !== RequestType::DELETE && json_decode($e->getResponse()->getBody())->error_code != 7)
                throw ExceptionStatusCodeFactory::create($e->getResponse());
        } catch (ServerException $e) {
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

    public function getResponseHandler() {
        return $this->responseHandler;
    }

    protected function handleResponse(ResponseInterface $response, ClientInterface $client) {
        $handler = $this->getResponseHandler();

        return $handler->handle($response, $client);
    }

    public function setResponseHandler(ResponseHandler $responseHandler = null) {
        if ($responseHandler)
            $this->responseHandler = $responseHandler;
    }

    /**
     * @return Collection
     */
    public function getQueryParams() {
        return $this->queryParams;
    }

    public function addQueryParam($key, $value) {
        $this->queryParams->put($key, $value);
    }

    /**
     * @return Collection
     */
    public function getBody() {
        return $this->body;
    }

    public function getFilePath() {
        return $this->filePath;
    }

    protected function getPostBody() {
        return $this->body->toArray();
    }

    protected function addToBody($key, $value) {
        $this->body->put($key, $value);
    }

    protected function setFilePath($filePath) {
        $this->filePath = $filePath;
    }

    private function request(ClientInterface $client) {
        return $client->request($this->getRequestType(), $this->getUrl(), $this->getOptions());
    }

    private function getOptions() {
        $options = array(
           RequestOptions::HEADERS => $this->getHeaders()
        );

        if ($this->needsPostBody())
            $options[RequestOptions::FORM_PARAMS] = $this->getPostBody();
        if (!empty($this->filePath))
            $options[RequestOptions::BODY] = fopen($this->filePath, 'r');

        return $options;
    }

    private function getHeaders() {
        return array(
            'Authorization' => (is_null($this->token)) ? "" : "Bearer " . $this->token
        );
    }

    private function needsPostBody() {
        return in_array($this->getRequestType(), array(RequestType::POST, RequestType::PUT)) && $this->body->count() > 0;
    }
}