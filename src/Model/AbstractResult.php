<?php


namespace Satiricon\AcoustId\Model;


use Satiricon\AcoustId\AcoustIdService;

abstract class AbstractResult {

	/** @var $api AcoustIdService */
	private $api;

	public function setApiService(AcoustIdService $api) : AbstractResult {
		$this->api = $api;

		return $this;
	}

	public function getApiService() : AcoustIdService {
		return $this->api;
	}

}