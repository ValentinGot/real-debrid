<?php

namespace RealDebrid\Request\Hosts;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /hosts/status
 *
 * Get status of supported hosters or not and their status on competitors
 * @package RealDebrid\Request\Hosts
 * @author Valentin GOT
 */
class StatusRequest extends AbstractRequest {

    /**
     * Get status of supported hosters or not and their status on competitors
     *
     * @param Token $token Access Token
     */
    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "hosts/status";
    }
}