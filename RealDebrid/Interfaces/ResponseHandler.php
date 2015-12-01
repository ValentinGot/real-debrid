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

    /**
     * Handle a server-side response
     *
     * @param ResponseInterface $response Server-side response
     * @param ClientInterface $client Client interface for sending HTTP requests
     * @return mixed The handled response
     */
    public function handle(ResponseInterface $response, ClientInterface $client);
}