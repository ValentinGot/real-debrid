<?php

namespace RealDebrid\Request\Forum;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * GET /forum/{id}
 *
 * Get the list of all topics inside the concerned forum
 * @package RealDebrid\Request\Forum
 * @author Valentin GOT
 */
class TopicsRequest extends AbstractRequest {
    private $id;

    /**
     * Get the list of all topics inside the concerned forum
     *
     * Warning: You can not use both offset and page at the same time, page is prioritized in case it happens.
     * @param Token $token Access token
     * @param int $id Forum ID
     * @param bool $meta TRUE to show meta informations; FALSE otherwise
     * @param int $page Pagination system
     * @param int $limit Entries returned per page / request (must be within 0 and 100, default: 50)
     * @param int $offset Starting offset (must be within 0 and X-Total-Count HTTP header)
     */
    public function __construct(Token $token, $id, $meta, $page, $limit, $offset) {
        parent::__construct();

        $this->setToken($token);
        $this->id = $id;
        $this->addQueryParam('meta', ($meta) ? '1' : '0');
        if (!is_null($page))
            $this->addQueryParam('page', $page);
        $this->addQueryParam('limit', $limit);
        if (!is_null($offset))
            $this->addQueryParam('offset', $offset);
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