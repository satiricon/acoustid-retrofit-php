<?php


namespace Satiricon\AcoustId\Model;


class ReleaseGroup {

	/** @var string */
	private $id;

	/** @var string */
	private $title;

	/** @var string */
	private $type;

	/** @var array */
	private $secondarytypes;

	/** @var array */
	private $artists;

	/** @var array */
	private $releases;

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return ReleaseGroup
	 */
	public function setId( string $id ): ReleaseGroup {
		$this->id = $id;

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
	 * @return ReleaseGroup
	 */
	public function setTitle( string $title ): ReleaseGroup {
		$this->title = $title;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getType(): string {
		return $this->type;
	}

	/**
	 * @param string $type
	 *
	 * @return ReleaseGroup
	 */
	public function setType( string $type ): ReleaseGroup {
		$this->type = $type;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getSecondarytypes(): array {
		return $this->secondarytypes;
	}

	/**
	 * @param array $secondarytypes
	 *
	 * @return ReleaseGroup
	 */
	public function setSecondarytypes( array $secondarytypes ): ReleaseGroup {
		$this->secondarytypes = $secondarytypes;

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
	 * @return ReleaseGroup
	 */
	public function setArtists( array $artists ): ReleaseGroup {
		$this->artists = $artists;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getReleases(): array {
		return $this->releases;
	}

	/**
	 * @param Release[] $releases
	 *
	 * @return ReleaseGroup
	 */
	public function setReleases( array $releases ): ReleaseGroup {
		$this->releases = $releases;

		return $this;
	}



}