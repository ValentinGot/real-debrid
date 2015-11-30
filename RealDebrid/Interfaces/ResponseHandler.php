<?php

namespace RealDebrid\Interfaces;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use RealDebrid\Auth\Token;

/**
 * Interface ResponseHandler
 *
 * @package RealDebrid\Interfaces
 * @author Valentin GOT
 * @interface
 */
interface ResponseHandler {
    public function handle(ResponseInterface $response, ClientInterface $client);
}