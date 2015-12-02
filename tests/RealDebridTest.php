<?php

use \RealDebrid\RealDebrid;
use \RealDebrid\Auth\Token;
use \GuzzleHttp\Client;

class RealDebridTest extends PHPUnit_Framework_TestCase {

    public function testCanInitiate() {
        $realDebrid = new RealDebrid(new Token(getToken()), new Client());

        $this->assertInstanceOf('RealDebrid\RealDebrid', $realDebrid);
    }

    public function testValidToken() {
        $realDebrid = new RealDebrid(new Token(getToken()));

        $this->assertNotNull($realDebrid->user->get());
    }

    public function testInvalidToken() {
        $this->setExpectedException('RealDebrid\Exception\BadTokenException');

        $realDebrid = new RealDebrid(new Token('INVALID_TOKEN'));
        $realDebrid->user->get();
    }
}