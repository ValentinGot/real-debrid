<?php

namespace RealDebrid\Request\Traffic;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class TrafficRequest
 *
 * @package RealDebrid\Request\Traffic
 * @author Valentin GOT
 */
class TrafficRequest extends AbstractRequest {

    /**
     * Get traffic informations for limited hosters (limits, current usage, extra packages)
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
        return "traffic";
    }
}