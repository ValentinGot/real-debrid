<?php

namespace RealDebrid\Exception;

use Psr\Http\Message\ResponseInterface;

/**
 * ExceptionStatusCodeFactory
 *
 * Handle HTTP requests errors
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class ExceptionStatusCodeFactory {

    /**
     * Return a new exception depending on the HTTP status code
     *
     * @param ResponseInterface $response Server-side response
     * @return ActionAlreadyDoneException|BadRequestException|BadTokenException|PermissionDeniedException|RealDebridException|UnknownResourceException
     */
    public static function create(ResponseInterface $response) {
        $error = json_decode($response->getBody());

        switch($response->getStatusCode()) {
            case 202:
                return new ActionAlreadyDoneException();
                break;
            /*case 400:
                return new BadRequestException();
                break;*/
            case 401:
                return new BadTokenException();
                break;
            case 403:
                return new PermissionDeniedException();
                break;
            case 404:
                return new UnknownResourceException();
                break;
            case 503:
                return new FileUnavailableException();
                break;
        }

        return new RealDebridException($error);
    }
}