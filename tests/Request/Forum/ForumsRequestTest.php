<?php

use \RealDebrid\Request\Forum\ForumsRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class ForumsRequestTest extends PHPUnit_Framework_TestCase {

    public function testForumsRequest() {
        $request = new ForumsRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('forum', $request->getUri());
    }
}