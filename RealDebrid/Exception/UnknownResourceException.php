<?php

namespace RealDebrid\Exception;

/**
 * UnknownResourceException
 *
 * The resource has'nt been found. HTTP Status Code: 404
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class UnknownResourceException extends \Exception {
    protected $message = 'Unknown Resource';
}