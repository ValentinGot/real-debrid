<?php

namespace RealDebrid\Response\Handlers;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use RealDebrid\Interfaces\ResponseHandler;

/**
 * Class DefaultResponseHandler
 *
 * @package RealDebrid\Response\Handlers
 * @author Valentin GOT
 */
class DefaultResponseHandler extends  AbstractResponseHandler implements ResponseHandler {

    public function handle(ResponseInterface $response, ClientInterface $client) {
        return $this->getJson($response);
    }
}