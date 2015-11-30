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

    public function __construct(Token $token, ClientInterface $client) {
        $this->token = $token;
        $this->client = $client;
    }

    protected function request(AbstractRequest $request) {
        return $request->make($this->client);
    }
}