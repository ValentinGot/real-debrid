<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Torrents\SelectFilesRequest;

class SelectFilesRequestTest extends \PHPUnit_Framework_TestCase {

    public function testSelectFilesRequest() {
        $request = new SelectFilesRequest(new Token(getToken()), 'TORRENT_ID', []);

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('TORRENT_ID', $request->getId());
        $this->assertEquals('all', $request->getBody()->get('files'));
        $this->assertEquals('torrents/selectFiles/:id', $request->getUri());
        $this->assertEquals('torrents/selectFiles/TORRENT_ID', $request->getUrl());
    }

    public function testNotEmptyFiles() {
        $request = new SelectFilesRequest(new Token(getToken()), 'TORRENT_ID', [1, 2, 3]);

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('TORRENT_ID', $request->getId());
        $this->assertEquals('1,2,3', $request->getBody()->get('files'));
        $this->assertEquals('torrents/selectFiles/:id', $request->getUri());
        $this->assertEquals('torrents/selectFiles/TORRENT_ID', $request->getUrl());
    }
}