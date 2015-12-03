<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\Hosts\HostsRequest;
use RealDebrid\Request\RequestType;

class HostsRequestTest extends \PHPUnit_Framework_TestCase {

    public function testHostsRequest() {
        $request = new HostsRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('hosts', $request->getUri());
    }
}