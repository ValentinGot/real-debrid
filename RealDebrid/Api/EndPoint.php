<?php

namespace RealDebrid\Api;

use GuzzleHttp\ClientInterface;
use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;

/**
 * Class EndPoint
 *
 * @package RealDebrid\Api
 * @author Valentin GOT
 */
class EndPoint {

    /**
     * @var Token
     */
    protected $token;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * EndPoint constructor.
     *
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
     * @return null
     * @throws \RealDebrid\Exception\BadTokenException
     * @throws \RealDebrid\Exception\PermissionDeniedException
     * @throws \RealDebrid\Exception\RealDebridException
     * @throws \RealDebrid\Exception\UnknownResourceException
     */
    protected function request(AbstractRequest $request) {
        return $request->make($this->client);
    }
}