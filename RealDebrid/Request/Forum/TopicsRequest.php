<?php

namespace RealDebrid\Request\Forum;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class TopicsRequest
 *
 * @package RealDebrid\Request\Forum
 * @author Valentin GOT
 */
class TopicsRequest extends AbstractRequest {
    private $id;

    /**
     * Get the list of all topics inside the concerned forum
     *
     * @param Token $token Access token
     * @param int $id Forum ID
     * @param bool|true $meta TRUE to show meta informations; FALSE otherwise
     * @param int $page Pagination system
     * @param int $limit Entries returned per page / request (must be within 0 and 100, default: 50)
     * @param int|null $offset Starting offset (must be within 0 and X-Total-Count HTTP header)
     */
    public function __construct(Token $token, $id, $meta, $page, $limit, $offset) {
        parent::__construct();

        $this->setToken($token);
        $this->id = $id;
        $this->queryParams['meta'] = ($meta) ? '1' : '0';
        $this->queryParams['page'] = $page;
        $this->queryParams['limit'] = $limit;
        if (!is_null($offset))
            $this->queryParams['offset'] = $offset;
    }

    public function getId() {
        return $this->id;
    }

    public function getRequestType() {
        return RequestType::GET;
    }

    public function getUri() {
        return "forum/:id";
    }
}