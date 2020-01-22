<?php


namespace Satiricon\AcoustId\Converter;


use Tebru\PhpType\TypeToken;
use Tebru\Retrofit\ConverterFactory;
use Tebru\Retrofit\RequestBodyConverter;
use Tebru\Retrofit\ResponseBodyConverter;
use Tebru\Retrofit\StringConverter;

class AcoustIdConverterFactory implements ConverterFactory{

	protected $responseBodyConverter;

	public function __construct(AcousticIdResponseBodyConverter $responseBodyConverter) {
		$this->responseBodyConverter = $responseBodyConverter;
	}

	/**
	 * @inheritDoc
	 */
	public function responseBodyConverter( TypeToken $type ): ?ResponseBodyConverter {
		return $this->responseBodyConverter->setType($type);
	}

	/**
	 * @inheritDoc
	 */
	public function requestBodyConverter( TypeToken $type ): ?RequestBodyConverter {
		// TODO: Implement requestBodyConverter() method.
		return null;
	}

	/**
	 * @inheritDoc
	 */
	public function stringConverter( TypeToken $type ): ?StringConverter {
		// TODO: Implement stringConverter() method.
		return null;
	}
}