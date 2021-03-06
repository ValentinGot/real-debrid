<?php

namespace RealDebrid\Request\Unrestrict;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * POST /unrestrict/folder
 *
 * Unrestrict a hoster folder link and get individual links
 * @package RealDebrid\Request\Unrestrict
 * @author Valentin GOT
 */
class FolderRequest extends AbstractRequest {

    /**
     * Unrestrict a hoster folder link and get individual links
     *
     * @param Token $token Access token
     * @param string $link The hoster folder link
     */
    public function __construct(Token $token, $link) {
        parent::__construct();

        $this->setToken($token);
        $this->addToBody('link', $link);
    }

    public function getRequestType() {
        return RequestType::POST;
    }

    public function getUri() {
        return "unrestrict/folder";
    }
}