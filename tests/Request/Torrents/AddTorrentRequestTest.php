<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Torrents\AddTorrentRequest;

class AddTorrentRequestTest extends \PHPUnit_Framework_TestCase {

    public function testAddTorrentRequest() {
        $request = new AddTorrentRequest(new Token(getToken()), 'C:/fakepath');

        $this->assertEquals(RequestType::PUT, $request->getRequestType());
        $this->assertEquals('torrents/addTorrent', $request->getUri());
        $this->assertEquals('C:/fakepath', $request->getFilePath());
    }
}