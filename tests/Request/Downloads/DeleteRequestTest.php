<?php

use \RealDebrid\Request\Downloads\DeleteRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class DeleteRequestTest extends PHPUnit_Framework_TestCase {

    public function testDeleteRequest() {
        $request = new DeleteRequest(new Token(getToken()), 1);

        $this->assertEquals(RequestType::DELETE, $request->getRequestType());
        $this->assertEquals(1, $request->getId());
        $this->assertEquals('downloads/delete/:id', $request->getUri());
        $this->assertEquals('downloads/delete/1', $request->getUrl());
    }
}