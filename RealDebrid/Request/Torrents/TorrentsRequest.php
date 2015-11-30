<?php

namespace RealDebrid\Request\Torrents;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class TorrentsRequest
 *
 * @package RealDebrid\Request\Torrents
 * @author Valentin GOT
 */
class TorrentsRequest extends AbstractRequest {

    public function __construct(Token $token, $filter, $page, $limit, $offset) {
        parent::__construct();

        $this->setToken($token);
        if ($filter)
            $this->queryParams['filter'] = 'active';
        $this->queryParams['page'] = $page;
        $this->queryParams['limit'] = $limit;
        if (!is_null($offset))
            $this->queryParams['offset'] = $offset;
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "torrents";
    }
}