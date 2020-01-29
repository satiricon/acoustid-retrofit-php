<?php

namespace Satiricon\AcoustId\Tests\Unit;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Satiricon\AcoustId\AcoustIdService;
use Satiricon\AcoustId\Converter\AcousticIdResponseBodyConverter;
use Satiricon\AcoustId\Converter\AcoustIdConverterFactory;
use Satiricon\AcoustId\Model\Artist;
use Satiricon\AcoustId\Model\Recording;
use Satiricon\AcoustId\Model\Release;
use Satiricon\AcoustId\Model\ReleaseGroup;
use Satiricon\AcoustId\Model\Result;
use Satiricon\AcoustId\Model\Results;
use Tebru\Retrofit\HttpClient;
use Tebru\Retrofit\Retrofit;

class AcoustIdServiceTest extends TestCase {

	/** @var AcoustIdService  */
	private $service;

	public static $initialized = false;

	protected function setUp() : void {

		if(self::$initialized){
			return;
		}

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

		self::$initialized = true;

	}

	public function testLookup() : Results {
		//As we are not making a real request we dont need to pass the service real parameters
		$call = $this->service->lookup(new \ArrayObject([]));
		/** @var $results \Satiricon\AcoustId\Model\Results */
		$results = $call->execute()->body();
		$this->assertInstanceOf(Results::class, $results);

		return $results;
	}

	/**
	 * @depends testLookup
	 */
	public function testResult(Results $results) : Result {
		/** @var $result \Satiricon\AcoustId\Model\Result */
		$result = $results->offsetGet(0);
		$this->assertInstanceOf(Result::class, $result);

		return $result;
	}

	/**
	 * @depends testResult
	 */
	public function testRecording(Result $result) : Recording {
		/** @var $recording \Satiricon\AcoustId\Model\Recording */
		$recordings = array_reverse($result->getRecordings());
		$recording = array_pop($recordings);
		$this->assertInstanceOf(Recording::class, $recording);

		return $recording;
	}

	/**
	 * @depends testRecording
	 */
	public function testRecordingTitle(Recording $recording) {

		$this->assertEquals($recording->getTitle(), "C’est l’amour");
	}

	/**
	 * @depends testRecording
	 */
	public function testArtist(Recording $recording) : Artist {
		$artists = array_reverse($recording->getArtists());
		$artist = array_pop($artists);

		$this->assertInstanceOf(Artist::class, $artist);

		return $artist;
	}

	/**
	 * @depends testRecording
	 */
	public function testReleaseGroups(Recording $recording) : ReleaseGroup {
		$releaseGroups = array_reverse($recording->getReleasegroups());
		$releaseGroup = array_pop($releaseGroups);

		$this->assertInstanceOf(ReleaseGroup::class, $releaseGroup);

		return $releaseGroup;
	}




}
