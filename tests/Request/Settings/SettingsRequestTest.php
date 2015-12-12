<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Settings\SettingsRequest;

class SettingsRequestTest extends PHPUnit_Framework_TestCase {

    function testSettingsRequest() {
        $request = new SettingsRequest(new Token(getToken()));

        $this->assertEquals(RequestType::GET, $request->getRequestType());
        $this->assertEquals('settings', $request->getUri());
    }
}