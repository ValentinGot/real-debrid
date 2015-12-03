<?php

use \RealDebrid\Request\User\UserRequest;
use \RealDebrid\Auth\Token;
use \RealDebrid\Request\RequestType;

class UserRequestTest extends PHPUnit_Framework_TestCase {

    public function testUserRequest() {
        $request = new UserRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('user', $request->getUri());
    }
}