<?php

namespace RealDebrid\Request;

/**
 * Class AbstractPaginationRequest
 *
 * @package RealDebrid\Request
 * @author Valentin GOT
 */
abstract class AbstractPaginationRequest extends AbstractRequest {
    private $page = 1;
    private $limit = 50;

    public function __construct() {
        parent::__construct();

        $this->setPage($this->page);
        $this->setLimit($this->limit);
    }

    public function setPage($page) {
        $this->queryParams['page'] = $page;
    }

    public function setOffset($offset) {
        $this->queryParams['offset'] = $offset;
    }

    public function setLimit($limit) {
        $this->queryParams['limit'] = $limit;
    }
}