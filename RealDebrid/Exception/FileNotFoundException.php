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

	public function __construct($error) {
		parent::__construct("Sorry, we  weren't able to locate this file with reason: " . $error);
	}
}