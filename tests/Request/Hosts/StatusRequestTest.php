<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\Hosts\StatusRequest;
use RealDebrid\Request\RequestType;

class StatusRequestTest extends \PHPUnit_Framework_TestCase {

    public function testStatusRequest() {
        $request = new StatusRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('hosts/status', $request->getUri());
    }
}