<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Torrents\DeleteRequest;

class DeleteTorrentRequestTest extends \PHPUnit_Framework_TestCase {

    public function testDeleteRequest() {
        $request = new DeleteRequest(new Token(getToken()), 'TORRENT_ID');

        $this->assertEquals(RequestType::DELETE, $request->getRequestType());
        $this->assertEquals('TORRENT_ID', $request->getId());
        $this->assertEquals('torrents/delete/:id', $request->getUri());
        $this->assertEquals('torrents/delete/TORRENT_ID', $request->getUrl());
    }
}