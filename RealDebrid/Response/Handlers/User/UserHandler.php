<?php

namespace RealDebrid\Response\Handlers\User;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use RealDebrid\Interfaces\ResponseHandler;
use RealDebrid\Response\Handlers\AbstractResponseHandler;
use RealDebrid\Response\User;

/**
 * Handle /user request
 *
 * @package RealDebrid\Response\Handlers\User
 * @author Valentin GOT
 */
class UserHandler extends AbstractResponseHandler implements ResponseHandler {

    public function handle(ResponseInterface $response, ClientInterface $client) {
        return new User($this->getJson($response));
    }
}