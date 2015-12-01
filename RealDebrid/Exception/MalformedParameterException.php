<?php

namespace RealDebrid\Exception;

/**
 * MalformedParameterException
 *
 * Trying to access a getter that does not exists on the request object
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class MalformedParameterException extends \Exception {
    protected $message = "Trying to access a getter that does not exists on the request object";
}