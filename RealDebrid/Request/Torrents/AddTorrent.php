<?php

namespace RealDebrid\Request\Torrents;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class AddTorrent
 *
 * @package RealDebrid\Request\Torrents
 * @author Valentin GOT
 */
class AddTorrent extends AbstractRequest {

    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::PUT;
    }

    public function getUri() {
        return "torrents/addTorrent";
    }
}