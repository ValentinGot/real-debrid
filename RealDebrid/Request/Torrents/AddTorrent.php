<?php

namespace RealDebrid\Request\Torrents;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * PUT /torrents/addTorrent
 *
 * Add a torrent file to download
 * @package RealDebrid\Request\Torrents
 * @author Valentin GOT
 */
class AddTorrent extends AbstractRequest {

    /**
     * Add a torrent file to download
     *
     * @param Token $token Access token
     */
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