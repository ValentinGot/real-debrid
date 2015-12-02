<?php

class RequestTest extends PHPUnit_Framework_TestCase {

    public function testCanMakeRequest() {
        $user = getRealDebrid()->user->get();

        $this->assertInternalType('object', $user);
    }
}