<?php

namespace RealDebrid\Exception;

/**
 * BadRequestException
 *
 * Bad request. HTTP Status Code: 400
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class BadRequestException extends \Exception {
    protected $message = 'Bad request';
}