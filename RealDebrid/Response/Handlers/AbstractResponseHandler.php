<?php

namespace RealDebrid\Response\Handlers;

use Psr\Http\Message\ResponseInterface;
use RealDebrid\Auth\Token;

/**
 * Class AbstractResponseHandler
 *
 * @package RealDebrid\Response\Handlers
 * @author Valentin GOT
 */
class AbstractResponseHandler {
    private $token;

    public function getToken() {
        return $this->token;
    }

    public function setToken(Token $token) {
        $this->token = $token;
    }

    protected function getJson(ResponseInterface $response) {
        return json_decode($response->getBody());
    }
}