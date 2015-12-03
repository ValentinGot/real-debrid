<?php

class ApiTest extends PHPUnit_Framework_TestCase {

    /**
     * @var \RealDebrid\RealDebrid
     */
    protected $realDebrid;

    function setUp() {
        $this->realDebrid = getRealDebrid();
    }

    function testIsUser() {
        $this->assertInstanceOf('RealDebrid\Api\User', $this->realDebrid->user);
    }

    function testIsUnrestrict() {
        $this->assertInstanceOf('RealDebrid\Api\Unrestrict', $this->realDebrid->unrestrict);
    }

    function testIsTraffic() {
        $this->assertInstanceOf('RealDebrid\Api\Traffic', $this->realDebrid->traffic);
    }

    function testIsDownloads() {
        $this->assertInstanceOf('RealDebrid\Api\Downloads', $this->realDebrid->downloads);
    }

    function testIsTorrents() {
        $this->assertInstanceOf('RealDebrid\Api\Torrents', $this->realDebrid->torrents);
    }

    function testIsHosts() {
        $this->assertInstanceOf('RealDebrid\Api\Hosts', $this->realDebrid->hosts);
    }

    function testIsForum() {
        $this->assertInstanceOf('RealDebrid\Api\Forum', $this->realDebrid->forum);
    }

    function testIsSettings() {
        $this->assertInstanceOf('RealDebrid\Api\Settings', $this->realDebrid->settings);
    }
}