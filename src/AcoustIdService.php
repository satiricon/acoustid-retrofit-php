<?php
namespace Satiricon\AcoustId;


use Tebru\Retrofit\Annotation\GET;
use Tebru\Retrofit\Annotation\QueryMap;
use Tebru\Retrofit\Annotation\ResponseBody;
use Tebru\Retrofit\Call;

interface AcoustIdService {

	/**
	 * @GET("/v2/lookup")
	 * @QueryMap("queryMap")
	 * @ResponseBody("Satiricon\AcoustId\Results")
	 */
	public function lookup(\Traversable $queryMap) : Call;

}