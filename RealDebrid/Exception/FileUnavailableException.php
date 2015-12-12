<?php

namespace RealDebrid\Exception;

/**
 * FileUnavailableException
 *
 * The file you are looking for is unavailable or doesn't exists. HTTP Status Code: 503
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class FileUnavailableException extends \Exception {
	protected $message = "File unavailable";
}