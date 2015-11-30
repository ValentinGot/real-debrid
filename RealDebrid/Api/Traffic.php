<?php

namespace RealDebrid\Api;

/**
 * Class Traffic
 *
 * @package RealDebrid\Api
 * @author Valentin GOT
 */
class Traffic extends EndPoint {

    /**
     * Get traffic informations for limited hosters (limits, current usage, extra packages)
     *
     * @return \stdClass Traffic informations
     */
    public function get() {
        return $this->request();
    }

    /**
     * Get traffic details on each hoster used during a defined period
     *
     * @param string|null $start Start period, default: a week ago
     * @param string|null $end End period, default: today
     * @return mixed
     */
    public function details($start = null, $end = null) {
        return $this->request();
    }
}