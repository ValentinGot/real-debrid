<?php

namespace RealDebrid\Request\Unrestrict;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * POST /unrestrict/link
 *
 * Unrestrict a hoster link and get a new unrestricted link
 * @package RealDebrid\Request\Unrestrict
 * @author Valentin GOT
 */
class LinkRequest extends AbstractRequest {
    private $body = array();

    /**
     * Unrestrict a hoster link and get a new unrestricted link
     *
     * @param Token $token Access token
     * @param string $link The original hoster link
     * @param string $password Password to unlock the file access hoster side
     * @param string $remote Use Remote traffic, dedicated servers and account sharing protections lifted
     */
    public function __construct(Token $token, $link, $password, $remote) {
        parent::__construct();

        $this->setToken($token);
        $body['link'] = $link;
        if (!empty($password))
            $body['password'] = $password;
        if (!empty($remote))
        $body['remote'] = $remote;
    }

    public function getRequestType() {
        return RequestType::POST;
    }

    public function getUri() {
        return "unrestrict/link";
    }

    protected function getPostBody() {
        return $this->body;
    }
}