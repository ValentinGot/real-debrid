<?php

namespace RealDebrid\Api;

use RealDebrid\Request\Unrestrict\LinkRequest;

/**
 * /unrestrict namespace
 *
 * Provides a set of methods to unrestrict your hoster links
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Unrestrict extends EndPoint {

    /**
     * Unrestrict a hoster link and get a new unrestricted link
     *
     * @param string $link The original hoster link
     * @param string|null $password Password to unlock the file access hoster side
     * @param string|null $remote Use Remote traffic, dedicated servers and account sharing protections lifted
     * @return \stdClass Unrestricted link(s)
     */
    public function link($link, $password = null, $remote = null) {
        return $this->request(new LinkRequest($this->token, $link, $password, $remote));
    }
}