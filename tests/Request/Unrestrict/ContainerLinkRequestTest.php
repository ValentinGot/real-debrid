<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Unrestrict\ContainerLinkRequest;

class ContainerLinkRequestTest extends PHPUnit_Framework_TestCase {

    function testContainerLinkRequest() {
        $request = new ContainerLinkRequest(new Token(getToken()), 'https://hoster.com/ABCDEFG');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/containerLink', $request->getUri());
        $this->assertEquals('https://hoster.com/ABCDEFG', $request->getBody()->get('link'));
    }
}