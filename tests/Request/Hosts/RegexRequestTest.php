<?php

use \RealDebrid\Request\Hosts\RegexRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class RegexRequestTest extends PHPUnit_Framework_TestCase {

    public function testRegexRequest() {
        $request = new RegexRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('hosts/regex', $request->getUri());
    }
}