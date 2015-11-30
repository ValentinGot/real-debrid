<?php

namespace RealDebrid\Exception;

/**
 * Class ActionAlreadyDoneException
 *
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class ActionAlreadyDoneException extends \Exception {
    protected $message = 'Action already done';
}