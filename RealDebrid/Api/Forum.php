<?php

namespace RealDebrid\Api;
use RealDebrid\Request\Forum\ForumsRequest;
use RealDebrid\Request\Forum\TopicsRequest;

/**
 * Class Forum
 *
 * @package RealDebrid\Api
 * @author Valentin GOT
 */
class Forum extends EndPoint {

    /**
     * Get the list of all forums with their category names
     *
     * @return \stdClass List of forums
     */
    public function forums() {
        return $this->request(new ForumsRequest($this->token));
    }

    /**
     * Get the list of all topics inside the concerned forum
     *
     * @param int $id Forum ID
     * @param bool|true $meta TRUE to show meta informations; FALSE otherwise
     * @param int $page Pagination system
     * @param int $limit Entries returned per page / request (must be within 0 and 100, default: 50)
     * @param int|null $offset Starting offset (must be within 0 and X-Total-Count HTTP header)
     * @return \stdClass List of topics
     */
    public function topics($id, $meta = true, $page = 1, $limit = 50, $offset = null) {
        return $this->request(new TopicsRequest($this->token, $id, $meta, $page, $limit, $offset));
    }
}