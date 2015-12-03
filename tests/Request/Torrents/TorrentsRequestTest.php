<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Torrents\TorrentsRequest;

class TorrentsRequestTest extends \PHPUnit_Framework_TestCase {

    public function testTorrentsRequest() {
        $request = new TorrentsRequest(new Token(getToken()), false, 1, 50, null);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('torrents', $request->getUri());
        $this->assertEquals('torrents?page=1&limit=50', $request->getUrl());
    }

    public function testFilterActive() {
        $request = new TorrentsRequest(new Token(getToken()), true, 1, 50, null);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('torrents', $request->getUri());
        $this->assertEquals('torrents?filter=active&page=1&limit=50', $request->getUrl());
    }

    public function testPrioritizePage() {
        $request = new TorrentsRequest(new Token(getToken()), false, 1, 50, 5);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('torrents', $request->getUri());
        $this->assertEquals('torrents?page=1&limit=50', $request->getUrl());
    }

    public function testOffset() {
        $request = new TorrentsRequest(new Token(getToken()), false, null, 50, 5);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('torrents', $request->getUri());
        $this->assertEquals('torrents?limit=50&offset=5', $request->getUrl());
    }
}