<?php

namespace RealDebrid\Request\Settings;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * POST /settings/update
 *
 * Update a user setting
 * @package RealDebrid\Request\Settings
 * @author Valentin GOT
 */
class UpdateRequest extends AbstractRequest {

    /**
     * Update a user setting
     *
     * @param Token $token Access token
     * @param string $name Setting name
     * @param string $value Possible values are available in /settings
     */
    public function __construct(Token $token, $name, $value) {
        parent::__construct();

        $this->setToken($token);
        $this->addToBody('setting_name', $name);
        $this->addToBody('setting_value', $value);
    }

    public function getRequestType() {
        return RequestType::POST;
    }

    public function getUri() {
        return "settings/update";
    }
}