<?php

namespace RealDebrid\Request\Downloads;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractPaginationRequest;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /downloads
 *
 * Get user downloads list
 * @package RealDebrid\Request\Downloads
 * @author Valentin GOT
 */
class DownloadsRequest extends AbstractRequest {

    /**
     * Get user downloads list
     *
     * Warning: You can not use both offset and page at the same time, page is prioritized in case it happens.
     * @param Token $token Access token
     * @param int $page Starting offset (must be within 0 and X-Total-Count HTTP header)
     * @param int $limit Pagination system
     * @param int|null $offset Entries returned per page / request (must be within 0 and 100, default: 50)
     */
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