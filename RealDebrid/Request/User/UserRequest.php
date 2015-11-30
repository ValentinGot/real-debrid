<?php

namespace RealDebrid\Request\User;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class UserRequest
 *
 * @package RealDebrid\Request\User
 * @author Valentin GOT
 */
class UserRequest extends AbstractRequest {

    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "user";
    }
}