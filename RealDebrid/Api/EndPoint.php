<?php

namespace RealDebrid\Api;

use GuzzleHttp\ClientInterface;
use RealDebrid\Auth\Token;
use RealDebrid\Interfaces\ResponseHandler;
use RealDebrid\Request\AbstractRequest;

/**
 * API EndPoint
 *
 * Extended by all API classes to instantiate it and making the HTTP requests
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @filesource
 */
class EndPoint {

    /**
     * @var Token Access token to authenticate HTTP requests
     */
    protected $token;

    /**
     * @var ClientInterface Client interface for sending HTTP requests
     */
    private $client;

    /**
     * EndPoint constructor.
     *
     * Initialize the API
     * @param Token $token Access Token
     * @param ClientInterface $client Client interface
     */
    public function __construct(Token $token, ClientInterface $client) {
        $this->token = $token;
        $this->client = $client;
    }

    /**
     * Requests the abstract request.
     *
     * @param AbstractRequest $request
     * @param ResponseHandler $responseHandler
     * @return mixed|null The handled response
     * @throws \RealDebrid\Exception\BadTokenException
     * @throws \RealDebrid\Exception\PermissionDeniedException
     * @throws \RealDebrid\Exception\RealDebridException
     * @throws \RealDebrid\Exception\UnknownResourceException
     */
    protected function request(AbstractRequest $request, ResponseHandler $responseHandler = null) {
        return $request->make($this->client, $responseHandler);
    }
}