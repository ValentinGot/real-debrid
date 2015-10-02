<?php

namespace RealDebrid\Exception;

class TooManyAttemptsException extends \Exception {

    public function __construct() {
        parent::__construct('You made too many attempts. Please resolve the captcha.');
    }
}