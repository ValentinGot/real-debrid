<?php

use RealDebrid\RealDebrid;
use RealDebrid\Auth\Token;

class TrafficTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \RealDebrid\RealDebrid
     */
    protected $realDebrid;

    function setUp() {
        $this->realDebrid = getRealDebrid();
    }

    function testGet() {
        $client = mock_client(200, '{
            "hoster.com": {
                "left": 0,
                "bytes": 0,
                "links": 0,
                "limit": 15,
                "type": "gigabytes",
                "extra": 0,
                "reset": "daily"
            },
            "remote": {
                "left": 0,
                "type": "bytes"
            }
        }');

        $realDebrid = new RealDebrid(new Token(getToken()), $client);
        $response = $realDebrid->traffic->get();

        $this->assertInstanceOf('\stdClass', $response);
    }

    function testDetails() {

    }
}
