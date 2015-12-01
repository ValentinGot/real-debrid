<?php

namespace RealDebrid\Auth;

/**
 * Access token
 *
 * Real-Debrid access token to authenticate your HTTP requests
 * @package RealDebrid\Auth
 * @author Valentin GOT
 */
class Token {

    /**
     * @var string The token
     */
    private $token;

    /**
     * Token constructor.
     *
     * @param string $token Token value
     */
    public function __construct($token) {
        $this->token = $token;
    }

    public function __toString() {
        return $this->token;
    }
}