<?php

namespace RealDebrid\Exception;

class UnauthorizedException extends \Exception {

    public function __construct() {
        parent::__construct('You gave the wrong identifiers.');
    }
}