<?php

namespace RealDebrid\Request\Settings;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * PUT /settings/avatarFile
 *
 * Upload a new user avatar image
 * @package RealDebrid\Request\Settings
 * @author Valentin GOT
 */
class AvatarFileRequest extends AbstractRequest {

    /**
     * Upload a new user avatar image
     *
     * @param Token $token
     */
    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::PUT;
    }

    public function getUri() {
        return "settings/avatarFile";
    }
}