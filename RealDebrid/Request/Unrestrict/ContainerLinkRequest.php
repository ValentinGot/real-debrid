<?php

namespace RealDebrid\Request\Unrestrict;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * POST /unrestrict/containerLink
 *
 * Decrypt a container file from a link
 * @package RealDebrid\Request\Unrestrict
 * @author Valentin GOT
 */
class ContainerLinkRequest extends AbstractRequest {
    private $body = array();

    /**
     * Decrypt a container file from a link
     *
     * @param Token $token Access token
     * @param string $link HTTP Link of the container file
     */
    public function __construct(Token $token, $link) {
        parent::__construct();

        $this->setToken($token);
        $body['link'] = $link;
    }

    public function getRequestType() {
        return RequestType::POST;
    }

    public function getUri() {
        return "unrestrict/containerLink";
    }

    protected function getPostBody() {
        return $this->body;
    }
}