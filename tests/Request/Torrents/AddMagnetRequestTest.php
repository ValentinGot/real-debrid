<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Torrents\AddMagnetRequest;

class AddMagnetRequestTest extends \PHPUnit_Framework_TestCase {

    public function testAddMagnetRequest() {
        $request = new AddMagnetRequest(new Token(getToken()), 'magnet:?aaaaaaa');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('torrents/addMagnet', $request->getUri());
        $this->assertEquals('magnet:?aaaaaaa', $request->getBody()->get('magnet'));
        $this->assertNull($request->getBody()->get('host'));
        $this->assertNull($request->getBody()->get('split'));
    }

    public function testWithHost() {
        $request = new AddMagnetRequest(new Token(getToken()), 'magnet:?aaaaaaa', 'uptobox.com');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('torrents/addMagnet', $request->getUri());
        $this->assertEquals('magnet:?aaaaaaa', $request->getBody()->get('magnet'));
        $this->assertEquals('uptobox.com', $request->getBody()->get('host'));
        $this->assertNull($request->getBody()->get('split'));
    }

    public function testWithSplit() {
        $request = new AddMagnetRequest(new Token(getToken()), 'magnet:?aaaaaaa', 'uptobox.com', 50);

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('torrents/addMagnet', $request->getUri());
        $this->assertEquals('magnet:?aaaaaaa', $request->getBody()->get('magnet'));
        $this->assertEquals('uptobox.com', $request->getBody()->get('host'));
        $this->assertEquals(50, $request->getBody()->get('split'));
    }

    public function testWithSplitAndNoHost() {
        $request = new AddMagnetRequest(new Token(getToken()), 'magnet:?aaaaaaa', null, 50);

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('torrents/addMagnet', $request->getUri());
        $this->assertEquals('magnet:?aaaaaaa', $request->getBody()->get('magnet'));
        $this->assertNull($request->getBody()->get('host'));
        $this->assertNull($request->getBody()->get('split'));
    }
}