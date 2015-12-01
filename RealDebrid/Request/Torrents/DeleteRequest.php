<?php

namespace RealDebrid\Request\Torrents;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * DELETE /torrents/delete/{id}
 *
 * Delete a torrent from torrents list
 * @package RealDebrid\Request\Torrents
 * @author Valentin GOT
 */
class DeleteRequest extends AbstractRequest {
    private $id;

    /**
     * Delete a torrent from torrents list
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
        return RequestType::DELETE;
    }

    public function getUri() {
        return "torrents/delete/:id";
    }

}