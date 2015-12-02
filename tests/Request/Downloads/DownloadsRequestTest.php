<?php

use \RealDebrid\Request\Downloads\DownloadsRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class DownloadsRequestTest extends PHPUnit_Framework_TestCase {

    public function testDownloadsRequest() {
        $request = new DownloadsRequest(new Token(getToken()), 1, 50, null);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('downloads', $request->getUri());
        $this->assertEquals('downloads?page=1&limit=50', $request->getUrl());
    }

    public function testPrioritizePage() {
        $request = new DownloadsRequest(new Token(getToken()), 1, 50, 5);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('downloads', $request->getUri());
        $this->assertEquals('downloads?page=1&limit=50', $request->getUrl());
    }

    public function testOffset() {
        $request = new DownloadsRequest(new Token(getToken()), null, 50, 5);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('downloads', $request->getUri());
        $this->assertEquals('downloads?limit=50&offset=5', $request->getUrl());
    }
}