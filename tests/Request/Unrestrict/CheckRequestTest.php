<?php

use \RealDebrid\Request\Unrestrict\CheckRequest;
use \RealDebrid\Request\RequestType;

class CheckRequestTest extends PHPUnit_Framework_TestCase {

    function testCheckRequest() {
        $request = new CheckRequest('http://hoster.com/ABCDEFG');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/check', $request->getUri());
        $this->assertEquals('http://hoster.com/ABCDEFG', $request->getBody()->get('link'));
        $this->assertNull($request->getBody()->get('password'));
    }

    function testWithPassword() {
        $request = new CheckRequest('http://hoster.com/ABCDEFG', 'apassword');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/check', $request->getUri());
        $this->assertEquals('http://hoster.com/ABCDEFG', $request->getBody()->get('link'));
        $this->assertEquals('apassword', $request->getBody()->get('password'));
    }
}