<?php

namespace RealDebrid\Request\Unrestrict;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * PUT /unrestrict/containerFile
 *
 * Decrypt a container file (RSDF, CCF, CCF3, DLC)
 * @package RealDebrid\Request\Unrestrict
 * @author Valentin GOT
 */
class ContainerFileRequest extends AbstractRequest {

    /**
     * Decrypt a container file (RSDF, CCF, CCF3, DLC)
     *
     * @param Token $token Access token
     */
    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::PUT;
    }

    public function getUri() {
        return "unrestrict/containerFile";
    }
}