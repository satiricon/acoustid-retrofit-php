<?php


namespace Satiricon\AcoustId\Model;


class Recording {

	/** @var string */
	protected $id;

	/** @var array */
	protected $artists;

	/** @var integer */
	protected $duration;

	/** @var array */
	protected $releasegroups;

	/** @var integer */
	protected $sources;

	/** @var string */
	protected $title;

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return Recording
	 */
	public function setId( string $id ): Recording {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getArtists(): array {
		return $this->artists;
	}

	/**
	 * @param Artist[] $artists
	 *
	 * @return Recording
	 */
	public function setArtists( array $artists ): Recording {
		$this->artists = $artists;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getDuration(): int {
		return $this->duration;
	}

	/**
	 * @param int $duration
	 *
	 * @return Recording
	 */
	public function setDuration( int $duration ): Recording {
		$this->duration = $duration;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getReleasegroups(): array {
		return $this->releasegroups;
	}

	/**
	 * @param ReleaseGroup[] $releasegroups
	 *
	 * @return Recording
	 */
	public function setReleasegroups( array $releasegroups ): Recording {
		$this->releasegroups = $releasegroups;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getSources(): int {
		return $this->sources;
	}

	/**
	 * @param int $sources
	 *
	 * @return Recording
	 */
	public function setSources( int $sources ): Recording {
		$this->sources = $sources;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @param string $title
	 *
	 * @return Recording
	 */
	public function setTitle( string $title ): Recording {
		$this->title = $title;

		return $this;
	}




}