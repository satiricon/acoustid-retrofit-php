<?php


namespace Satiricon\AcoustId\Model;

class Results extends \ArrayObject {

	protected $status;

	public function setStatus($status) : Results {
		$this->status = $status;

		return $this;
	}

	public function getStatus() : string {

		return $this->status;
	}
}