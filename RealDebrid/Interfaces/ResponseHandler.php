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
     * Handle a call response
     *
     * @param ResponseInterface $response Response interface
     * @param ClientInterface $client Client interface
     * @return mixed The handled response
     */
    public function handle(ResponseInterface $response, ClientInterface $client);
}