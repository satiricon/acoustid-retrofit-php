<?php


namespace Satiricon\AcoustId\Converter;


use Psr\Http\Message\StreamInterface;
use Tebru\Retrofit\RequestBodyConverter;

class AcousticIdRequestBodyConverter implements  RequestBodyConverter {

	public function convert( $value ): StreamInterface {

		return $value;
	}

}