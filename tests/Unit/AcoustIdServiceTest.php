<?php

namespace Satiricon\AcoustId\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Satiricon\AcoustId\AcoustIdService;
use Satiricon\AcoustId\Tests\Provider;
use Tebru\Retrofit\Retrofit;

class AcoustIdServiceTest extends TestCase {

	/** @var Retrofit */
	private $retrofit;

	/** @var \Traversable */
	private $map;

	/** @var AcoustIdService  */
	private $service;

	protected function setUp() : void {
		$this->retrofit = Provider::get(Retrofit::class);
		$this->map = [
			'client' => getenv('API_APP_TOKEN')
		];
		$this->service = $this->retrofit->create(AcoustIdService::class);
	}

	public function testRetrofitReady(){
		$this->assertNotNull($this->retrofit);
		$this->assertTrue($this->retrofit instanceof Retrofit);
	}

	public function testLookup() {
		$queryMap = array_merge([
			'meta' => ['recordings', 'releases', 'tracks', 'compress', 'usermeta', 'sources'],
			'duration' => '354',
			'fingerprint' => 'AQADtOKYSXJQ5jGeo3qPWmXRiMrxfjgq_fiQL0eyoyyHpqLxHLiO_8HThUuRS6OgxRcK_UT-HOfI4CKHJmGDPsKLVwnyG12iSNDyo0esqNGIaw_8HE6u_Ih_NFOP5El2nCp-Bc1H9MGYZUKlHK_woNhcI19c6Ee-pkVzV0SP96gES8Ml5bgPo9fxJ2PwJBNOM6hFH-c8nERzxA9-3Ah_PNgZfCh1knh48Nnw2IpROQeTWojcQ9cV5NuMB2WiD96TIXyI5G_QJOnSBD2qH82F78H4GeUPSo7AmSnCPELSWMmIH5UF73mIkLfwZ9DY9dCSI-pTVEfz4IpxVOqRUIpTBSF__DqOlykiJT3qRcGTlPBzVniQH-4ePJ4Q5zq0_Aj1g_F0NH6CXDoiB5VIBw2aZCPq1EH_o8F5PNGDOtrhPB1-ND-Rx0imJR_cLYdzHf3x47CY4Sf-o41yIcn5IMvaScT8o7oGv8dxVUNj8TiBs2g2VNuRaxMeCOHR9Hh1NCdxvEd-iDvC4_9QH__gyB_a4AeS5ciP5jgjEv8T4X7gqBSeHb9wBnkmIzeDSg-eBY8ENO-Ps8N_xMzx2SscJ0oT6MePZllGZQgt9EZP4XnxaMf8CCMpNEd9XFFTvCeeiUj4IDfeHH10NJMYvEfV8IFJHqfmwyeuSNgeD3U54yGadSl6ikmKG8lzRMobBv9CONrGodNWXFKC60mgZxbKhUGzEP-FH-fxFCfycIf2REak_IidIdn-BM13PD0YifnBv-iLJCfCCw2eHX-OPiJ-dFeO_9B1NAuXHH2y4cV_PMRIMbiuHFmiK0JPYl8kxD96qWh6Go-So9QeDdOJpJkeZHlzYQt3lGTxPDWqD5aHn4JDyiijI1kUNUT4pcLJ43jiDE1ENuge_MeP68aTHD8auUR15EliJLP6ophv5El4QuwWZJNNPD7RVI2ID2kPnYGP0BvyKIeW_ajMbAnY6To0SswQJiauHD22qsd1NNdxXD-uKA-u9OhuCc2LN8MRHk2eQFcx6YOjHOWRB9cVpD2EnMH9o8lpTD5-NAr6ED9yDsm-40w-_HCu49gt_HhelDzO4NxxhM8OzoOa57gP_RKO7Flc-MTx48d85DL040d63ChvBfeRoye06EEuXAn-EHOIPzjCHNrxD8-Dz2D07NCJDP5xrDmeI4e64zfSG-WPXwFyiA_yC0_wB3OOP_jRHOHxD2eegTf6LBvS_PhB4sd8pEiYR_hx_PDKGv2D49D0oxE93MqL78FbPDqOw8eN4zr-4LcSVJuOx8gPfUeuFP7xBz-OHz7yC8l1-Cd8q_hxscWLhDryGUc1TviHB8fRBMnIREf44ENDEkCP5jo-5EZy9LD6YIBJINeRB4al5yjeHDd8_EdkQ3v24nlq5AlueCHx48F25DD0IEWPV1dwvVKCp0qGB1kO8cgeNMeH44MV_vgdvMdDHs2foLqx4jLCD0mP78ePH94nhPszJMeJfkdjLTieRCLe4zoeHuGN5MeJpngWPKSCfygzHh-QQ-eRC_6EfDgMffhxXziQHvdx_Dh--MTzoUnL4MKP6xjDBMcfhPTxQeO_4RFexcQs9DqaPFAT0cTXRdDII8VfuD_6Hs0iHSUZHrslJO_QHJeOfIGr48t3fFFovMd7gbqO6eglfNkFK4rwH-cJPfjhipkwJ0nWwzt4JUePZI8QKVqOS-bwDHeGHzf8vUj-ITruPZi14zq641N0-At-3Ee-4Ovx5UL44-lyoDK2pocrF0fsB8l-dBMzfEmIm8RPXMpAfYUVykTY-NB_ZHtQeSrc7ahDPOTx4kKfIlmqI88XNJhOTIz04ChP5Lyh50R4Hk18PMedp8gTQjsyHf2L_8eYpRlx6QrK4Idf_EXHXcfdSELzzEMfzPk0JNeQJU4_fPCXoW84VBysMpNQHUd-JGeFKzL6A6zUC89xH09P5CWkVEeO2gmcH0XXhYj3wH2hPZWIXsdzpA_xZPgfHH6G_nhn4Q_eHdfhXzge5D3U-QgjXQq-uBgffMpqbIyPn8IfHH4q9Dh5PKmQTxFUfYjTo3_hM8cn1GWJ-8HELBMc86hyXA8aJ1mD-uiPHKr3I5LiCDzmcMePeocdxqhF4zuOZ8fDkHj34S-H0LyhI62y4uk24sfhRDv8aQv6_PiD-VieMFOOK0eca2gmKke7VAgX3rij44S_hQjPQBfy7MOL5suEHw_cPUF-Bd4TCe0yCrqLS4a_FD_yUkT6hQu-S1izQ0voTEeW03iSJ9g_9P3xsMTxG7bYEdWJ3Tze4PyO8HlA4QgeH3sRD18EHcfpwqj-4MfRE1o0B9iFk0mAnEeOfima48f74OGQ5Tx8cMexH8-PM8gPFfnhu-jxK_gRaHmGcDN-4Ulw4XnwPJheND9-4k-OPiORlzlcEeJxhI9yTBQFPywOP8Fk4Yp-fBH-B-dxIvmP0Jmyw6qCPyieR8GsyEtQizmaZ8SJ5AXAiBEGAXIUNAJAAQVAAhhAhBDAEMGkcAIpQhwCABhCAHWOIIoIY44gQRUDhhIjAAFEOAaOIMAISpQghAGABBJMCIQAMxAYAwiABAkgDCASGsQgEkoZQAVzABCBCFICCGEMMpQQQQxBzICBhBTAAGOsQ1AQCIghAhigRELMKeENIECIIwwiTAChlQLEKQOIAkIIRAxCTDkADADAESGYQI44IBghBAEHCSHICEKUEQIQABQiAiIHkALIICSEIwyJIoRQyABAiCKCAeZAMUQgAggAwBDgDMCOACUIAMIAJwwhRChgAAEUIEYAUYQCgBghimBgoAGCCCCUQkoYIYRACAhHgMKECIAQIEAgIYgADjQBhAEEOOgEc1YJJhySgEJmqFCGOCwUAQQJRAgCAgAQnJKGgSuA0oIoBgxxYBFGKHBGICEhcIIFR5QQQGoEAARGEeeIIowwwIRhDEEBgGHuGSVIMgoQCJSR4ilnkXWECCECRYgC4YxhwhClFIGCAKaERUYywQkSFjRCHJEMKeGBIAQoAKAQBIBKBKgSEmEAIFoorBwBQgBjAUGAGCYEAAoEZwgRIBAFoWJEEaMUZEwBJiAzACwAMpJKoK0AMsYJJAxgRANOETMOCGcIwQZRAQQAAAhmGGGKAAGEIQg4JJAyRhDlBCCKIEYUIYAZJQAjBhBkFCBGMMEMIwIRJYQxVClBDDFMEECAFIIYoBgSQrCiBHESSEARMFIRAQQgxIgBAAEAAGyAQEIZeKzixiAGDFGCMWYAcIAIZ5BChrjAHEEOCieAoFQIggghgggLRBIISAEFIYApYgxDQiHihXCAUIQoYwYAQIDACikghEDAGAEAIgQZIJAQWggimKLECYCYABQJY5QQDCgkACAEOUeEAIAIAgQUSD1nBJFgKUAIKIgKBphQADwlBGBGKiaVIg5YBAQkRDEihGAKGCCAog4IwBAhwBEhDCJEAQMMUQgwBA'
		], $this->map);
		$call = $this->service->lookup(new \ArrayObject($queryMap));
		$result = $call->execute();

		$this->assertTrue(true);
		sleep(1);
	}

}
