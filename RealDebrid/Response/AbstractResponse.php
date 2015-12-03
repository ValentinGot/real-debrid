<?php

namespace RealDebrid\Response;

/**
 * AbstractResponse
 *
 * @package RealDebrid\Response
 * @author Valentin GOT
 */
class AbstractResponse {

    /**
     * @var \stdClass
     */
    private $json;

    public function __construct($json) {
        $this->json = $json;
    }

    public function getJson() {
        return $this->json;
    }
}