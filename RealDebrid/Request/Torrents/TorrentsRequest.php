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

    /**
     * Get user torrents list
     * Warning: You can not use both offset and page at the same time, page is prioritzed in case it happens.
     *
     * @param Token $token Access token
     * @param bool|false $filter TRUE to list only active torrents; FALSE otherwise
     * @param int $page Pagination system
     * @param int $limit Entries returned per page / request (must be within 0 and 100, default: 50)
     * @param int|null $offset Starting offset (must be within 0 and X-Total-Count HTTP header)
     */
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