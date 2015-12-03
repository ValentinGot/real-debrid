<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use \RealDebrid\Request\Torrents\InfoRequest;

class InfoRequestTest extends \PHPUnit_Framework_TestCase {

    public function testInfoRequest() {
        $request = new InfoRequest(new Token(getToken()), 'TORRENT_ID');

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('TORRENT_ID', $request->getId());
        $this->assertEquals('torrents/info/:id', $request->getUri());
        $this->assertEquals('torrents/info/TORRENT_ID', $request->getUrl());
    }
}