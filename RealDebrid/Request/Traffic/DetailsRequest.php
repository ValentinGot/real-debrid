<?php

namespace RealDebrid\Request\Traffic;

use Carbon\Carbon;
use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /traffic/details
 *
 * Get traffic details on each hoster used during a defined period
 * @package RealDebrid\Request\Traffic
 * @author Valentin GOT
 */
class DetailsRequest extends AbstractRequest {

    /**
     * Get traffic details on each hoster used during a defined period
     *
     * @param Token $token Access token
     * @param Carbon $start Start period, default: a week ago
     * @param Carbon $end End period, default: today
     */
    public function __construct(Token $token, Carbon $start, Carbon $end) {
        parent::__construct();

        $this->setToken($token);
        if (!is_null($start))
            $this->queryParams['start'] = $start->format('Y-m-d');
        if (!is_null($end))
            $this->queryParams['end'] = $start->format('Y-m-d');
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "traffic/details";
    }
}