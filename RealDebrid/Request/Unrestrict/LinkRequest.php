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

    /**
     * Unrestrict a hoster link and get a new unrestricted link
     *
     * @param Token $token Access token
     * @param string $link The original hoster link
     * @param string|null $password Password to unlock the file access hoster side
     * @param string|null $remote Use Remote traffic, dedicated servers and account sharing protections lifted
     */
    public function __construct(Token $token, $link, $password = null, $remote = null) {
        parent::__construct();

        $this->setToken($token);
        $this->addToBody('link', $link);
        if (!empty($password))
            $this->addToBody('password', $password);
        if (!empty($remote))
            $this->addToBody('remote', $remote);
    }

    public function getRequestType() {
        return RequestType::POST;
    }

    public function getUri() {
        return "unrestrict/link";
    }
}