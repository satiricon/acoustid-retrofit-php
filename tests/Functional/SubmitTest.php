<?php


namespace Satiricon\AcoustId\Tests\Functional;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Satiricon\AcoustId\AcoustIdService;
use Satiricon\AcoustId\Converter\AcousticIdResponseBodyConverter;
use Satiricon\AcoustId\Converter\AcoustIdConverterFactory;
use Tebru\Retrofit\HttpClient;
use Tebru\Retrofit\Internal\Converter\DefaultRequestBodyConverter;
use Tebru\Retrofit\Retrofit;
use Tebru\RetrofitHttp\Guzzle6\Guzzle6HttpClient;

class SubmitTest extends TestCase {

	public static $initialized = false;

	protected function setUp() : void {

		if(self::$initialized){
			return;
		}

		$client = new Class implements HttpClient {
			public function send( RequestInterface $request ): ResponseInterface {

				$response = new Response(200,
					['Content-Type' => 'application/json'],
					'{"status": "ok", "submissions": [{"id": 527301600, "index": "0", "status": "pending"}]}');

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
		                    ->addConverterFactory(new AcoustIdConverterFactory(
			                    new AcousticIdResponseBodyConverter(),
			                    new DefaultRequestBodyConverter() ) )
		                    ->build();

		$this->service = $retrofit->create(AcoustIdService::class);

		self::$initialized = true;

	}

	public function testSubmit(){
		$client = getenv('API_APP_TOKEN');
		$user = getenv('API_USER_TOKEN');
		$duration = new \ArrayObject([
			'duration.0' => 39
		]);
		$fingerPrint = new \ArrayObject([
			'fingerprint.0' => 'AQABKWGSKFmmCBdyGD98HEd__MOx9_jxgd9xLbh04TqPG82HrkVe1OkJRSa-I1yawxwqST5-fBN6wd8R2oc-EhHHoMsPx2EJ_nix8zie5cgJfUHO48uFP4vh4w1-5H1waEd_6IJ_PI-K9EF_4UTjZCna40J9-MT-w9rx5Dj8o97xC_mO5MaU8EWXHlVz4g8u9CnxHNcRmYJuxGw8XJrBWHVw8IePUj-B3BW0B6keNNuOccT54TnC1Dl6Q7UQmTs-JcfVoCJY9uAPH6G54wy-HFn740lyIYuaixAfnDCeIT2ysDrGy4esb8h1_Lh89ISP_rhtHKG0HXqmGBObxcgHniIuIv3iYmYOHdElXbgjOfiGF-dxXcXRi4crgiGRZyEu8oFMH_lx32hODxPx5KiF_NCP0MXD44vQszN8lMnxIL7QV4Pc5cGs4dpxHYf-w41shMcfYriyoHGNS8SRP5Ehkjs88UZ0ONx-8EfnYRJ1-C76BH9w8UTIQ-SR-8SLSUwe4WmOH02G6bhifBFCHeLwTUEY7wni40PDiEZ1fJqho9YjNO2Hh9KFHmaOnEe643Q-6Bfi_viPEz_x9XA-o2eCvNCjI89UvDvKCftWXLqM40QYZdCP_PiFOmhCq8WPsA5uwtEf1Mnxo9AyMvhwCrl2kIqInofzozde5gyO5uiFnxW6g0l6nIdv4sil_HgmaI-ObB8stcYVjriUHDnEP0JePIYboRaPC1cudHeJZGIYGSd55Df4gyFdVHSGL5on9ADRiMauUyAYKA45qAARiBABBiaMCKQUskQIIJgG1gnNgAKEIAKIEkgpoIgwAiAhtDAEIAaIQIoZwABS0BDplKMADSUQoAIbYwFARBhiFAIKCGOEMRQoZIgAzCCKGBFCGKYwEQ4RgAQRlCChiFBACYMAxAAQAAh0AAglmUJAAUSQQ0IAg4hzBABBIAJkACEIEI5QpJhCggAhEBLIIUWQEcQiRBgCQgClgABAGSSIEEZAAoDARigmADEWEGcBkGAIIRRSDhBCkBGKAAQuAOIxQ7wAgAoBEUAYIG0VBxAgQhwTwgI'
		]);
		$map = new \ArrayObject([
			'fileformat.0' => 'FLAC',
			'track.0' => '(f3)',
			'artist.0' => 'Katie Dey',
			'album.0' => 'Flood Network',
			'albumartist.0' => 'Katie Dey',
			'year.0' => '2016',
			'trackno.0' => '6',
			'discno.0' => 1
		]);

		$call = $this->service->submit($client, $user, $duration, $fingerPrint, $map);
		$response = $call->execute()->body();


	}



}