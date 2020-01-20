<?php


namespace Satiricon\AcoustId;

class Results implements \Iterator {

	protected $results;

	private $position = 0;

	/**
	 * @inheritDoc
	 */
	public function current() {
		return $this->results[$this->position];
	}

	/**
	 * @inheritDoc
	 */
	public function next() {
		++$this->position;
	}

	/**
	 * @inheritDoc
	 */
	public function key() {
		return $this->position;
	}

	/**
	 * @inheritDoc
	 */
	public function valid() {
		return isset($this->results[$this->position]);
	}

	/**
	 * @inheritDoc
	 */
	public function rewind() {
		$this->position = 0;
	}
}