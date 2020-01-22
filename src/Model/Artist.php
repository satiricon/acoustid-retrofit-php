<?php


namespace Satiricon\AcoustId\Model;


class Artist {

	/** @var string $id */
	private $id;

	/** @var string $name */
	private $name;

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 *
	 * @return Artist
	 */
	public function setId( string $id ): Artist {
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return Artist
	 */
	public function setName( string $name ): Artist {
		$this->name = $name;

		return $this;
	}


}