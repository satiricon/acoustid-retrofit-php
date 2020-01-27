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

	protected $proxyFactory;

	protected $api;

	protected $type;

	public function __construct( LazyLoadingGhostFactory $proxyFactory = null , AcoustIdService $api = null) {
		$this->proxyFactory = $proxyFactory;
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

		$results = new Results();
		$mapper = new \JsonMapper();

		$results = $mapper->mapArray(
			$decoded->results, $results, Result::class );
		$results->setStatus($decoded->status);

		return $results;
	}
}