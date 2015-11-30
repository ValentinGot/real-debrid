<?php

namespace RealDebrid\Request\Traffic;

use Carbon\Carbon;
use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class DetailsRequest
 *
 * @package RealDebrid\Request\Traffic
 * @author Valentin GOT
 */
class DetailsRequest extends AbstractRequest {

    public function __construct(Token $token, Carbon $start = null, Carbon $end = null) {
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