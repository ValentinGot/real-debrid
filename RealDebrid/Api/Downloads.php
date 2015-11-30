<?php

namespace RealDebrid\Api;

use RealDebrid\Request\Downloads\DeleteRequest;
use RealDebrid\Request\Downloads\DownloadsRequest;

/**
 * Class Downloads
 *
 * @package RealDebrid\Api
 * @author Valentin GOT
 */
class Downloads extends EndPoint {

    /**
     * Get user downloads list
     * Warning: You can not use both offset and page at the same time, page is prioritzed in case it happens.
     *
     * @param int $page Starting offset (must be within 0 and X-Total-Count HTTP header)
     * @param int $limit Pagination system
     * @param int|null $offset Entries returned per page / request (must be within 0 and 100, default: 50)
     * @return \stdClass Downloads list
     */
    public function get($page = 1, $limit = 50, $offset = null) {
        return $this->request(new DownloadsRequest($this->token, $page, $limit, $offset));
    }

    /**
     * Delete a link from downloads list
     *
     * @param string $id Download ID
     */
    public function delete($id) {
        $this->request(new DeleteRequest($this->token, $id));
    }
}