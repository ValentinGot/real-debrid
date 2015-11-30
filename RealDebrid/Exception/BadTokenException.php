<?php

namespace RealDebrid\Exception;

/**
 * Class BadTokenException
 *
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class BadTokenException extends \Exception {
    protected $message = 'Bad token (expired, invalid)';
}