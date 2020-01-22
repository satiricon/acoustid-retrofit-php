<?php


namespace Satiricon\AcoustId\Model;


class Track {

	/** @var string */
	private $id;

	/** @var integer */
	private $position;

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return Track
	 */
	public function setId( string $id ): Track {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getPosition(): int {
		return $this->position;
	}

	/**
	 * @param int $position
	 *
	 * @return Track
	 */
	public function setPosition( int $position ): Track {
		$this->position = $position;

		return $this;
	}


}