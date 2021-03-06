<?php

namespace RealDebrid\Request\Torrents;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /torrents/availableHosts
 *
 * Get available hosts to upload the torrent to
 * @package RealDebrid\Request\Torrents
 * @author Valentin GOT
 */
class AvailableHostsRequest extends AbstractRequest {

    /**
     * Get available hosts to upload the torrent to
     *
     * @param Token $token Access token
     */
    public function __construct(Token $token) {
        parent::__construct();

        $this->setToken($token);
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "torrents/availableHosts";
    }
}