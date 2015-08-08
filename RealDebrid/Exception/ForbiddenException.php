<?php

namespace RealDebrid\Exception;

class ForbiddenException extends \Exception {

    public function __construct() {
        parent::__construct('You must authenticate to access this resource.');
    }
}