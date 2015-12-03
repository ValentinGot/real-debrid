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
        $client = mock_client(200, '{
            "id": 1,
            "username": "ValentinGot",
            "email": "gotvalentin@gmail.com",
            "points": 950,
            "locale": "fr",
            "avatar": "https://cdn.real-debrid.com/images/avatars/214239_1448981351.1865.png",
            "type": "premium",
            "premium": 4320729,
            "expiration": "2016-01-21T19:37:40.000Z"
        }');

        $realDebrid = new RealDebrid(new Token(getToken()), $client);
        $response = $realDebrid->user->get();

        $this->assertInstanceOf('RealDebrid\Response\User', $response);
    }
}
