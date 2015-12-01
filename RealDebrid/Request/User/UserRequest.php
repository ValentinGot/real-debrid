<?php

namespace RealDebrid\Request\User;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /user
 *
 * Returns some information on the current user
 * @package RealDebrid\Request\User
 * @author Valentin GOT
 */
class UserRequest extends AbstractRequest {

    /**
     * Returns some information on the current user
     *
     * @param Token $token Access token
     */
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