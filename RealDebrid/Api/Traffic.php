<?php

namespace RealDebrid\Api;
use Carbon\Carbon;
use RealDebrid\Request\Traffic\DetailsRequest;
use RealDebrid\Request\Traffic\TrafficRequest;

/**
 * /traffic namespace
 *
 * Provides a set of methods to retrieve hoster traffic status
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Traffic extends EndPoint {

    /**
     * Get traffic information for limited hosters (limits, current usage, extra packages)
     *
     * @return \stdClass Traffic information
     */
    public function get() {
        return $this->request(new TrafficRequest($this->token));
    }

    /**
     * Get traffic details on each hoster used during a defined period
     *
     * @param Carbon|null $start Start period, default: a week ago
     * @param Carbon|null $end End period, default: today
     * @return \stdClass Traffic details
     */
    public function details(Carbon $start = null, Carbon $end = null) {
        return $this->request(new DetailsRequest($this->token, $start, $end));
    }
}