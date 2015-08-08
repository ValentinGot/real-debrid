<?php

namespace RealDebrid;

class Base {

    /**
     * The user must be authenticated to access the URL
     *
     * @return null if the user isn't authenticated
     */
    protected function must_be_authenticated() {
        if(!$this->is_authenticated())
            return null;
    }

    /**
     * Test if the user is authenticated
     *
     * @return bool TRUE if he is; FALSE otherwise
     */
    public function is_authenticated() {
        if(file_exists(CURL::$COOKIE_FILE_NAME)) {
            $cookie = CURL::cookie();

            return isset($cookie->auth) && $cookie->auth->expiration >= time();
        }

        return false;
    }
}