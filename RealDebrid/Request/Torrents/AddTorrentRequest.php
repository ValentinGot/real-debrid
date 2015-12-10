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
class AddTorrentRequest extends AbstractRequest {

    /**
     * Add a torrent file to download
     *
     * The files must be selected with the selectFiles method to start the torrent
     * @param Token $token Access token
     * @param string $path Path to the torrent file
     * @param int|null $host Hoster domain (retrieved from /torrents/availableHosts)
     * @param int|null $split Split size (under max_split_size of concerned hoster retrieved from /torrents/availableHosts)
     */
    public function __construct(Token $token, $path, $host = null, $split = null) {
        parent::__construct();

        $this->setToken($token);
        $this->setFilePath($path);
        if (!empty($host))
            $this->addToBody('host', $host);
        if (!empty($host) && !empty($split))
            $this->addToBody('split', $split);
    }

    public function getRequestType() {
        return RequestType::PUT;
    }

    public function getUri() {
        return "torrents/addTorrent";
    }
}