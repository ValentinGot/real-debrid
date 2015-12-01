<?php

namespace RealDebrid\Request\Torrents;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /torrents/info/{id}
 *
 * Get all information on the asked torrent
 * @package RealDebrid\Request\Torrents
 * @author Valentin GOT
 */
class InfoRequest extends AbstractRequest {
    private $id;

    /**
     * Get all information on the asked torrent
     *
     * @param Token $token Access token
     * @param string $id Torrent ID
     */
    public function __construct(Token $token, $id) {
        parent::__construct();

        $this->setToken($token);
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "torrents/info/:id";
    }
}