<?php

namespace RealDebrid\Exception;

/**
 * Class BadRequestException
 *
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class BadRequestException extends \Exception {
    protected $message = 'Bad request (bad setting value or setting name)';
}