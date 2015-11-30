<?php

namespace RealDebrid\Exception;

/**
 * Class PermissionDenied
 *
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class PermissionDeniedException extends \Exception {
    protected $message = 'Permission denied (account locked, not premium)';
}