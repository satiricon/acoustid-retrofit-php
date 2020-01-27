<?php


namespace Satiricon\AcoustId\Model;


class Result {

	protected $id;

	protected $recordings;

	protected $score;

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