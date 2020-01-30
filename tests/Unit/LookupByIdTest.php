<?php


namespace Satiricon\AcoustId\Tests\Unit;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Satiricon\AcoustId\AcoustIdService;
use Satiricon\AcoustId\Converter\AcousticIdResponseBodyConverter;
use Satiricon\AcoustId\Converter\AcoustIdConverterFactory;
use Satiricon\AcoustId\Model\Results;
use Tebru\Retrofit\HttpClient;
use Tebru\Retrofit\Retrofit;
use Tebru\RetrofitHttp\Guzzle6\Guzzle6HttpClient;

class LookupByIdTest extends TestCase {

	public static $initialized = false;

	protected function setUp() : void {

		if(self::$initialized){
			return;
		}

		$client = new Class implements HttpClient {
			public function send( RequestInterface $request ): ResponseInterface {

				$response = new Response(200,
					['Content-Type' => 'application/json'],
					file_get_contents(__DIR__.'/../etc/056fa6ea-16ab-4723-af9b-8dcac7c09f6a.json'));

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
		                    ->setBaseUrl("https://api.acoustid.org")
		                    ->addConverterFactory(new AcoustIdConverterFactory( new AcousticIdResponseBodyConverter() ) )
		                    ->build();

		$this->service = $retrofit->create(AcoustIdService::class);

		self::$initialized = true;

	}


	public function testLookup() {
		$id = "056fa6ea-16ab-4723-af9b-8dcac7c09f6a";

		$queryMap = new \ArrayObject([
			'client' => getenv('API_APP_TOKEN'),
			'meta'   => 'recordings+recordingids+releases+releaseids+releasegroups+releasegroupids+tracks+compress+usermeta+sources'
		]);

		$call = $this->service->lookupById($id , $queryMap);

		/** @var $results \Satiricon\AcoustId\Model\Results */
		$results = $call->execute()->body();

		$this->assertInstanceOf(Results::class, $results);

	}

}