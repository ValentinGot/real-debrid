<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Settings\AvatarFileRequest;

class AvatarFileRequestTest extends PHPUnit_Framework_TestCase {

    function testAvatarFileRequest() {
        $request = new AvatarFileRequest(new Token(getToken()), 'C:/fakepath/avatar.png');

        $this->assertEquals(RequestType::PUT, $request->getRequestType());
        $this->assertEquals('settings/avatarFile', $request->getUri());
    }
}