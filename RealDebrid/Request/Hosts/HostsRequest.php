<?php

namespace RealDebrid\Request\Hosts;

use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class HostsRequest
 *
 * @package RealDebrid\Request\Hosts
 * @author Valentin GOT
 */
class HostsRequest extends AbstractRequest {

    /**
     * Get supported hosts
     */
    public function __construct() {
        parent::__construct();
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "hosts";
    }

}