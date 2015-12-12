<?php

namespace Request\Unrestrict;

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Unrestrict\LinkRequest;

class LinkRequestTest extends \PHPUnit_Framework_TestCase {

    function testLinkRequest() {
        $request = new LinkRequest(new Token(getToken()), 'https://hoster.com/ABCDEFG');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/link', $request->getUri());
        $this->assertEquals('https://hoster.com/ABCDEFG', $request->getBody()->get('link'));
        $this->assertNull($request->getBody()->get('password'));
        $this->assertNull($request->getBody()->get('remote'));
    }

    function testWithPassword() {
        $request = new LinkRequest(new Token(getToken()), 'https://hoster.com/ABCDEFG', 'apassword');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/link', $request->getUri());
        $this->assertEquals('https://hoster.com/ABCDEFG', $request->getBody()->get('link'));
        $this->assertEquals('apassword', $request->getBody()->get('password'));
        $this->assertNull($request->getBody()->get('remote'));
    }

    function testWithPasswordAndRemote() {
        $request = new LinkRequest(new Token(getToken()), 'https://hoster.com/ABCDEFG', 'apassword', 'remote');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/link', $request->getUri());
        $this->assertEquals('https://hoster.com/ABCDEFG', $request->getBody()->get('link'));
        $this->assertEquals('apassword', $request->getBody()->get('password'));
        $this->assertEquals('remote', $request->getBody()->get('remote'));
    }
}