<?php

namespace RealDebrid\Request\Forum;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class ForumsRequest
 *
 * @package RealDebrid\Request\Forum
 * @author Valentin GOT
 */
class ForumsRequest extends AbstractRequest {

    /**
     * Get the list of all forums with their category names
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
        return "forum";
    }
}