<?php


namespace Satiricon\AcoustId\Converter;


use http\Env\Response;
use Tebru\PhpType\TypeToken;
use Tebru\Retrofit\ConverterFactory;
use Tebru\Retrofit\RequestBodyConverter;
use Tebru\Retrofit\ResponseBodyConverter;
use Tebru\Retrofit\StringConverter;

class AcoustIdConverterFactory implements ConverterFactory{

	protected $responseBodyConverter;
	protected $requestBodyConverter;

	public function __construct(ResponseBodyConverter $responseBodyConverter, RequestBodyConverter $requestBodyConverter) {
		$this->responseBodyConverter = $responseBodyConverter;
		$this->requestBodyConverter = $requestBodyConverter;
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

		return $this->requestBodyConverter;
	}

	/**
	 * @inheritDoc
	 */
	public function stringConverter( TypeToken $type ): ?StringConverter {
		// TODO: Implement stringConverter() method.
		return null;
	}
}