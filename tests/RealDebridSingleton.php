<?php

use RealDebrid\Auth\Token;
use RealDebrid\RealDebrid;

class RealDebridSingleton {
    private static $_instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$_instance))
            self::$_instance = new RealDebrid(new Token(getenv('TOKEN')));
        return self::$_instance;
    }
}