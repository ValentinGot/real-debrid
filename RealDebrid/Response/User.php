<?php

namespace RealDebrid\Response;

/**
 * User
 *
 * @package RealDebrid\Response
 * @author Valentin GOT
 */
class User extends AbstractResponse {
    private $id;
    private $username;
    private $email;
    private $points;
    private $locale;
    private $avatar;
    private $type;
    private $premium;
    private $expiration;

    public function __construct($json) {
        parent::__construct($json);

        $this->id = $json->id;
        $this->username = $json->username;
        $this->email = $json->email;
        $this->points = $json->points;
        $this->locale = $json->locale;
        $this->avatar = $json->avatar;
        $this->type = $json->type;
        $this->premium = $json->premium;
        $this->expiration = $json->expiration;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPoints() {
        return $this->points;
    }

    public function getLocale() {
        return $this->locale;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getType() {
        return $this->type;
    }

    public function getPremium() {
        return $this->premium;
    }

    public function getExpiration() {
        return $this->expiration;
    }
}