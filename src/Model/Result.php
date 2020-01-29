<?php


namespace Satiricon\AcoustId\Model;


class Result {

	protected $id;

	protected $recordings;

	protected $score;

	protected $releasegroups;

	protected $releases;

	protected $tracks;

	/**
	 * @return Release[]
	 */
	public function getReleases() : ?array {
		return $this->releases;
	}

	/**
	 * @param Release[] $releases
	 *
	 * @return Result
	 */
	public function setReleases( $releases ) : Result {
		$this->releases = $releases;

		return $this;
	}

	/**
	 * @return Track[]
	 */
	public function getTracks() : ?array {
		return $this->tracks;
	}

	/**
	 * @param Track[] $tracks
	 *
	 * @return Result
	 */
	public function setTracks( $tracks ) : Result {
		$this->tracks = $tracks;

		return $this;
	}



	/**
	 * @return ReleaseGroup[]
	 */
	public function getReleasegroups() : ?array {
		return $this->releasegroups;
	}

	/**
	 * @param ReleaseGroup[] $releasegroups
	 *
	 * @return Result
	 */
	public function setReleasegroups( $releasegroups ) : Result {
		$this->releasegroups = $releasegroups;

		return $this;
	}


	public function setId(string $id) : Result {
		$this->id = $id;

		return $this;
	}

	public function getId() : string {

		return $this->id;
	}

	public function addRecording(Recording $recording) : Result {
		array_push($this->recordings, $recording);

		return $this;
	}

	/**
	 * @param Recording[] $recordings
	 */
	public function setRecordings(?array $recordings) : Result {

		$this->recordings = $recordings;

		return $this;
	}

	/**
	 * @return Recording[]
	 */
	public function getRecordings() : ?array {

		return $this->recordings;
	}

	public function setScore(?float $score) : Result {

		$this->score = $score;

		return $this;
	}

	public function getScore() : ?float {

		return $this->score;
	}

}