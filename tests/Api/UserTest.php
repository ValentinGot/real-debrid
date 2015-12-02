<?php

namespace tests\Api;

use RealDebrid\Auth\Token;
use RealDebrid\RealDebrid;

class UserTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \RealDebrid\RealDebrid
     */
    protected $realDebrid;

    function setUp() {
        $this->realDebrid = getRealDebrid();
    }

    function testGet() {
        $client = mock_client(200, '{}');
        $realDebrid = new RealDebrid(new Token(getToken()), $client);

        $res = $realDebrid->user->get();

        $this->assertInternalType('object', $res);
    }
}
