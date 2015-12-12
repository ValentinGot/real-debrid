<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Unrestrict\ContainerFileRequest;

class ContainerFileRequestTest extends PHPUnit_Framework_TestCase {

    function testContainerFileRequest() {
        $request = new ContainerFileRequest(new Token(getToken()), 'C:/fakepath/container.rsdf');

        $this->assertEquals(RequestType::PUT, $request->getRequestType());
        $this->assertEquals('unrestrict/containerFile', $request->getUri());
        $this->assertEquals('C:/fakepath/container.rsdf', $request->getFilePath());
    }
}