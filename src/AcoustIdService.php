<?php
namespace Satiricon\AcoustId;


use Tebru\Retrofit\Annotation\GET;
use Tebru\Retrofit\Annotation\Path;
use Tebru\Retrofit\Annotation\POST;
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

	/**
	 * @POST("/v2/submit")
	 * @Query("client")
	 * @Query("user")
	 * @QueryMap("duration", encoded=true)
	 * @QueryMap("fingerprint", encoded=true)
	 * @QueryMap("queryMap", encoded=true)
	 *
	 * @param $client
	 * @param $user
	 * @param \Traversable $duration
	 * @param \Traversable $fingerprint
	 * @param \Traversable $queryMap
	 *
	 * @return Call
	 */
	public function submit(string $client, string $user,
		\Traversable $duration, \Traversable  $fingerprint, \Traversable $queryMap) : Call;

}