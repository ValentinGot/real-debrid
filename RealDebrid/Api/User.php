<?php

namespace RealDebrid\Api;

use RealDebrid\Request\User\UserRequest;

/**
 * Class User
 *
 * @package RealDebrid\Api
 * @author Valentin GOT
 */
class User extends EndPoint {

    /**
     * Returns some information on the current user.
     *
     * @return \stdClass Some information on the current user
     */
    public function get() {
        return $this->request(new UserRequest($this->token));
    }
}