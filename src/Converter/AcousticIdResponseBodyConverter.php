<?php


namespace Satiricon\AcoustId\Converter;


use ProxyManager\Factory\LazyLoadingGhostFactory;
use Psr\Http\Message\StreamInterface;
use Satiricon\AcoustId\AcoustIdService;
use Satiricon\AcoustId\Model\Result;
use Satiricon\AcoustId\Model\Results;
use Tebru\PhpType\TypeToken;
use Tebru\Retrofit\ResponseBodyConverter;

class AcousticIdResponseBodyConverter implements ResponseBodyConverter{

	protected $api;

	protected $type;

	public function __construct( AcoustIdService $api = null) {
		$this->api = $api;
	}

	public function setType(TypeToken $type) : ResponseBodyConverter {
		$this->type = $type;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function convert( StreamInterface $value ) {

		$decoded = json_decode((string) $value);
		dump($decoded);
		if(property_exists($decoded, 'error')) {
			return $decoded;
		}

		$results = new Results();
		$mapper = new \JsonMapper();

		$results = $mapper->mapArray(
			$decoded->results, $results, Result::class );
		$results->setStatus($decoded->status);

		return $results;
	}
}