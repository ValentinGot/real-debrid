<?php

namespace RealDebrid\Auth;

/**
 * Class Token
 *
 * @package RealDebrid\Auth
 * @author Valentin GOT
 */
class Token {
    private $token;

    public function __construct($token) {
        $this->token = $token;
    }

    public function __toString() {
        return $this->token;
    }
}