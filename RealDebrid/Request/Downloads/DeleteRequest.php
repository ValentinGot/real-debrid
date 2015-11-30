<?php

namespace RealDebrid\Request\Downloads;

use RealDebrid\Auth\Token;
use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * Class DeleteRequest
 *
 * @package RealDebrid\Request\Downloads
 * @author Valentin GOT
 */
class DeleteRequest extends AbstractRequest {
    private $id;

    public function __construct(Token $token, $id) {
        parent::__construct();

        $this->setToken($token);
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getRequestType() {
        return RequestType::DELETE;
    }

    public function getUri() {
        return "downloads/delete/:id";
    }
}