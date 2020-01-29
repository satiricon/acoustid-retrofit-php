<?php

namespace Satiricon\AcoustId\Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Satiricon\AcoustId\AcoustIdService;
use Satiricon\AcoustId\Converter\AcousticIdResponseBodyConverter;
use Satiricon\AcoustId\Converter\AcoustIdConverterFactory;
use Satiricon\AcoustId\Model\Result;
use Satiricon\AcoustId\Model\Results;
use Tebru\Retrofit\HttpClient;
use Tebru\Retrofit\Retrofit;

class AcoustIdServiceTest extends TestCase {

	/** @var Retrofit */
	private $retrofit;

	/** @var \Traversable */
	private $map;

	/** @var AcoustIdService  */
	private $service;

	protected function setUp() : void {

		$client = new Class implements HttpClient {
			public function send( RequestInterface $request ): ResponseInterface {
				$response = new Response(200,
					['Content-Type' => 'application/json'],
				file_get_contents(__DIR__.'/../etc/results.json'));
				return $response;
			}

			public function sendAsync( RequestInterface $request, callable $onResponse, callable $onFailure ): void {
				//do nothing
			}

			public function wait(): void {
				//Do nothing
			}
		};

		$retrofit = Retrofit::builder()
			->setHttpClient($client)
			->setBaseUrl("http://anything")
			->addConverterFactory(new AcoustIdConverterFactory( new AcousticIdResponseBodyConverter() ) )
		->build();

		$this->service = $retrofit->create(AcoustIdService::class);

	}

	public function testLookup() {

		$call = $this->service->lookup(new \ArrayObject([]));
		/** @var $results \Satiricon\AcoustId\Model\Results */
		$results = $call->execute()->body();
		$this->assertInstanceOf(Results::class, $results);

		$result = $results->offsetGet(0);
		$this->assertInstanceOf(Result::class, $result);
	}

}
