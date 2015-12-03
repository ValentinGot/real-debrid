<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\Hosts\DomainsRequest;
use RealDebrid\Request\RequestType;

class DomainsRequestTest extends \PHPUnit_Framework_TestCase {

    public function testDomainsRequest() {
        $request = new DomainsRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('hosts/domains', $request->getUri());
    }
}