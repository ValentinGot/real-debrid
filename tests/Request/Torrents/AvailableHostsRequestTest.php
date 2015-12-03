<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Torrents\AvailableHostsRequest;

class AvailableHostsRequestTest extends \PHPUnit_Framework_TestCase {

    public function testAvailableHostsRequest() {
        $request = new AvailableHostsRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('torrents/availableHosts', $request->getUri());
    }
}