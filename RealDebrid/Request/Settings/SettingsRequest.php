<?php

namespace RealDebrid\Request\Settings;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /settings
 *
 * Get current user settings with possible values to update
 * @package RealDebrid\Request\Settings
 * @author Valentin GOT
 */
class SettingsRequest extends AbstractRequest {

    /**
     * Get current user settings with possible values to update
     *
     * @param Token $token
     */
    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "settings";
    }
}