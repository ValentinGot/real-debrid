<?php

namespace RealDebrid\Request\Unrestrict;

use RealDebrid\Request\AbstractRequest;
use RealDebrid\Request\RequestType;

/**
 * POST /unrestrict/check
 *
 * Check if a file is downloadable on the concerned hoster
 * @package RealDebrid\Request\Unrestrict
 * @author Valentin GOT
 */
class CheckRequest extends AbstractRequest {

	/**
	 * Check if a file is downloadable on the concerned hoster
	 *
	 * @param string $link The original hoster link
	 * @param string|null $password Password to unlock the file access hoster side
	 */
	public function __construct($link, $password = null) {
		parent::__construct();

		$this->addToBody('link', $link);
		if (!empty($password))
			$this->addToBody('password', $password);
	}

	public function getRequestType() {
		return RequestType::POST;
	}

	public function getUri() {
		return "unrestrict/check";
	}
}