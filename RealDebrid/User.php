<?php

namespace RealDebrid;

use RealDebrid\Exception\ForbiddenException;
use RealDebrid\Exception\TooManyAttemptsException;
use RealDebrid\Exception\UnauthorizedException;

class User extends Base {

    /**
     * Login to real-debrid.com
     *
     * @param string $login Login
     * @param string $password Password
     * @return \stdClass Log information
     * @throws \Exception An error occurred at login
     */
    public function login($login, $password) {
        $login = json_decode(CURL::exec('ajax/login.php?user=' . $login . '&pass=' . $password));

        // Error handling
        if($login->error === 1)
            throw new UnauthorizedException;
        if($login->error === 2)
            throw new \Exception;
        if($login->error === 3)
            throw new TooManyAttemptsException;
        if($login->error > 3)
            throw new \Exception;

        return $login;
    }

    /**
     * Get valid hosters
     *
     * @return array Array of valid hosters
     * @throws \Exception
     */
    public function valid_hosters() {
        $valid_hosters = CURL::exec('api/hosters.php');

        return explode(',', str_replace('"', '', $valid_hosters));
    }

    /**
     * Get informations about the logged account
     *
     * @return \stdClass Account informations; NULL if the user is not authenticated
     * @throws ForbiddenException User is not authenticated
     */
    public function account() {
        if(!$this->is_authenticated())
            throw new ForbiddenException;

        $account = CURL::exec('api/account.php?out=json');

        return json_decode($account);
    }
}