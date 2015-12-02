<?php

use \RealDebrid\Request\Traffic\DetailsRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class DetailsRequestTest extends PHPUnit_Framework_TestCase {

    public function testDetailsRequest() {
        $request = new DetailsRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('traffic/details', $request->getUri());
    }
}