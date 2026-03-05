<?php

namespace bookingtime\phpsdkapp\Sdk\ApiRoute;
use bookingtime\phpsdkapp\Sdk\Route;
use bookingtime\phpsdkapp\Lib\BasicLib;



/**
 * handle specific API requests
 *
 * @author <bookingtime GmbH>
 */
class UserRoute extends Route {



	/**
	 * show an entity
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function show(array $urlParameter,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['userId'],$urlParameter);
		$response=$this->httpClient->request('GET','/user/'.$urlParameter['userId'].'/show',[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * edit an entity
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	array		$requestContent: send this content to api
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function edit(array $urlParameter,array $requestContent,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['userId'],$urlParameter);
		$response=$this->httpClient->request('PUT','/user/'.$urlParameter['userId'].'/edit',$requestContent,$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}
}
