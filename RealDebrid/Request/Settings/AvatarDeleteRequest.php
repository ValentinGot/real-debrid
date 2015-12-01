<?php

namespace RealDebrid\Request\Settings;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * DELETE /settings/avatarDelete
 *
 * Reset user avatar image to default
 * @package RealDebrid\Request\Settings
 * @author Valentin GOT
 */
class AvatarDeleteRequest extends AbstractRequest {

    /**
     * Reset user avatar image to default
     *
     * @param Token $token Access token
     */
    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::DELETE;
    }

    public function getUri() {
        return "settings/avatarDelete";
    }
}