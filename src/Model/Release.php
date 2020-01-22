<?php


namespace Satiricon\AcoustId\Model;


class Release {

	/** @var string */
	private $id;

	/** @var array */
	private $date;

	/** @var integer */
	private $mediumCount;

	/** @var integer */
	private $trackCount;

	/** @var array */
	private $mediums;

	/** @var array */
	private $releaseevent;

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return Release
	 */
	public function setId( string $id ): Release {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getDate(): array {
		return $this->date;
	}

	/**
	 * @param array $date
	 *
	 * @return Release
	 */
	public function setDate( array $date ): Release {
		$this->date = $date;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getMediumCount(): int {
		return $this->mediumCount;
	}

	/**
	 * @param int $mediumCount
	 *
	 * @return Release
	 */
	public function setMediumCount( int $mediumCount ): Release {
		$this->mediumCount = $mediumCount;

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
	 * @return Release
	 */
	public function setTrackCount( int $trackCount ): Release {
		$this->trackCount = $trackCount;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getMediums(): array {
		return $this->mediums;
	}

	/**
	 * @param Medium[] $mediums
	 *
	 * @return Release
	 */
	public function setMediums( array $mediums ): Release {
		$this->mediums = $mediums;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getReleaseevent(): array {
		return $this->releaseevent;
	}

	/**
	 * @param array $releaseevent
	 *
	 * @return Release
	 */
	public function setReleaseevent( array $releaseevent ): Release {
		$this->releaseevent = $releaseevent;

		return $this;
	}


}