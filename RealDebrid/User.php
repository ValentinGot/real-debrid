<?php

namespace RealDebrid;

class User extends Base {

    /**
     * Login to real-debrid.com.
     *
     * @param string $login Login
     * @param string $password Password
     * @return \stdClass Log information
     * @throws \Exception
     */
    public function login($login, $password) {
        $login = json_decode(CURL::exec($this->base_url . 'ajax/login.php?user=' . $login . '&pass=' . $password, $this->curl_opts));

        // Error when authenticating
        if($login->error > 0)
            throw new \Exception($login->message);

        return $login;
    }

    /**
     * GET valid hosters
     *
     * @return array Array of valid hosters
     * @throws \Exception
     */
    public function valid_hosters() {
        $valid_hosters = CURL::exec($this->base_url . 'api/hosters.php', $this->curl_opts);

        return explode(',', str_replace('"', '', $valid_hosters));
    }

    /**
     * Get informations about the logged account.
     *
     * @return \stdClass Account informations; NULL if the user is not authenticated
     */
    public function account() {
        $this->must_be_authenticated();

        $account = CURL::exec($this->base_url . 'api/account.php?out=json', $this->curl_opts);

        return json_decode($account);
    }
}