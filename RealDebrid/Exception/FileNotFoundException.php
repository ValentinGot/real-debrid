<?php

namespace RealDebrid\Exception;

/**
 * FileNotFoundException
 *
 * The file wasn't found
 * @package RealDebrid\Exception
 * @author Valentin GOT
 */
class FileNotFoundException extends \Exception {
	protected $message = "Sorry, we  weren't able to locate this file";
}