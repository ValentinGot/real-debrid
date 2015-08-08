<?php

namespace RealDebrid;

class Base {

    /**
     * Test if the user is authenticated
     *
     * @return bool TRUE if he is; FALSE otherwise
     */
    public function is_authenticated() {
        if(file_exists(__DIR__ . '/../' . CURL::$COOKIE_FILE_PATH)) {
            $cookie = CURL::cookie();

            return isset($cookie->auth) && $cookie->auth->expiration >= time();
        }

        return false;
    }
}