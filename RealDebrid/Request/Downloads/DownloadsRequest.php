<?php

namespace RealDebrid\Request\Downloads;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractPaginationRequest;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class DownloadsRequest
 *
 * @package RealDebrid\Request\Downloads
 * @author Valentin GOT
 */
class DownloadsRequest extends AbstractRequest {

    public function __construct(Token $token, $page, $limit, $offset = null) {
        parent::__construct();

        $this->setToken($token);
        $this->queryParams['page'] = $page;
        $this->queryParams['limit'] = $limit;
        if (!is_null($offset))
            $this->queryParams['offset'] = $offset;
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "downloads";
    }
}