<?php

use \RealDebrid\Request\Traffic\TrafficRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class TrafficRequestTest extends PHPUnit_Framework_TestCase {

    public function testTrafficRequest() {
        $request = new TrafficRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('traffic', $request->getUri());
    }
}