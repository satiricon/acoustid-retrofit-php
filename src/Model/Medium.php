<?php


namespace Satiricon\AcoustId\Model;


class Medium {

	/** @var string */
	private $format;

	/** @var integer */
	private $position;

	/** @var integer */
	private $trackCount;

	/** @var array */
	private $tracks;

	/**
	 * @return string
	 */
	public function getFormat(): string {
		return $this->format;
	}

	/**
	 * @param string $format
	 *
	 * @return Medium
	 */
	public function setFormat( string $format ): Medium {
		$this->format = $format;

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
	 * @return Medium
	 */
	public function setPosition( int $position ): Medium {
		$this->position = $position;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getTrackCount(): int {
		return $this->trackCount;
	}

	/**
	 * @param int $trackCount
	 *
	 * @return Medium
	 */
	public function setTrackCount( int $trackCount ): Medium {
		$this->trackCount = $trackCount;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getTracks(): array {
		return $this->tracks;
	}

	/**
	 * @param Track[] $tracks
	 *
	 * @return Medium
	 */
	public function setTracks( array $tracks ): Medium {
		$this->tracks = $tracks;

		return $this;
	}



}