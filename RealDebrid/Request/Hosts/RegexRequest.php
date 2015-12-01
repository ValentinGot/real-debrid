<?php

namespace RealDebrid\Request\Hosts;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /hosts/regex
 *
 * Get all supported links Regex, usefull to find supported links inside a document
 * @package RealDebrid\Request\Hosts
 * @author Valentin GOT
 */
class RegexRequest extends AbstractRequest {

    /**
     * Get all supported links Regex, usefull to find supported links inside a document
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
        return "hosts/regex";
    }
}