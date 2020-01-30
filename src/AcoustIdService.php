<?php
namespace Satiricon\AcoustId;


use Tebru\Retrofit\Annotation\GET;
use Tebru\Retrofit\Annotation\Path;
use Tebru\Retrofit\Annotation\Query;
use Tebru\Retrofit\Annotation\QueryMap;
use Tebru\Retrofit\Annotation\ResponseBody;
use Tebru\Retrofit\Call;

interface AcoustIdService {

	/**
	 * @GET("/v2/lookup")
	 * @QueryMap("queryMap", encoded=true)
	 * @ResponseBody("Satiricon\AcoustId\Model\Results")
	 *
	 * @param \Traversable $queryMap
	 *
	 * @return Call
	 */
	public function lookup(\Traversable $queryMap) : Call;

	/**
	 * @GET("/v2/lookup")
	 * @Query("trackid", var="id")
	 * @QueryMap("queryMap", encoded=true)
	 * @ResponseBody("Satiricon\AcoustId\Model\Results")
	 *
	 * @param string $id
	 * @param \Traversable $queryMap
	 *
	 * @return Call
	 */
	public function lookupByID(string $id, \Traversable $queryMap) : Call;

}