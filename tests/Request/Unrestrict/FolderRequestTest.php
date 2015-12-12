<?php

use RealDebrid\Auth\Token;
use RealDebrid\Request\RequestType;
use RealDebrid\Request\Unrestrict\FolderRequest;

class FolderRequestTest extends PHPUnit_Framework_TestCase {

    function testFolderRequest() {
        $request = new FolderRequest(new Token(getToken()), 'https://hoster.com/ABCDEFG');

        $this->assertEquals(RequestType::POST, $request->getRequestType());
        $this->assertEquals('unrestrict/folder', $request->getUri());
        $this->assertEquals('https://hoster.com/ABCDEFG', $request->getBody()->get('link'));
    }
}