<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Settings\AvatarDeleteRequest;

class AvatarDeleteRequestTest extends PHPUnit_Framework_TestCase {

    function testAvatarDeleteRequest() {
        $request = new AvatarDeleteRequest(new Token(getToken()));

        $this->assertEquals(RequestType::DELETE, $request->getRequestType());
        $this->assertEquals('settings/avatarDelete', $request->getUri());
    }
}