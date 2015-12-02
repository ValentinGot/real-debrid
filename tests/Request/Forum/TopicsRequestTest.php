<?php

use \RealDebrid\Request\Forum\TopicsRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class TopicsRequestTest extends PHPUnit_Framework_TestCase {

    public function testTopicsRequest() {
        $request = new TopicsRequest(new Token(getToken()), 4, true, 1, 50, null);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals(4, $request->getId());
        $this->assertEquals('forum/:id', $request->getUri());
        $this->assertEquals('forum/4?meta=1&page=1&limit=50', $request->getUrl());
    }

    public function testNoMeta() {
        $request = new TopicsRequest(new Token(getToken()), 4, false, 1, 50, null);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals(4, $request->getId());
        $this->assertEquals('forum/:id', $request->getUri());
        $this->assertEquals('forum/4?meta=0&page=1&limit=50', $request->getUrl());
    }

    public function testPrioritizePage() {
        $request = new TopicsRequest(new Token(getToken()), 4, true, 1, 50, 5);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals(4, $request->getId());
        $this->assertEquals('forum/:id', $request->getUri());
        $this->assertEquals('forum/4?meta=1&page=1&limit=50', $request->getUrl());
    }

    public function testOffset() {
        $request = new TopicsRequest(new Token(getToken()), 4, true, null, 50, 5);

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals(4, $request->getId());
        $this->assertEquals('forum/:id', $request->getUri());
        $this->assertEquals('forum/4?meta=1&limit=50&offset=5', $request->getUrl());
    }
}