<?php

namespace bookingtime\phpsdkapp\Sdk\ApiRoute;
use bookingtime\phpsdkapp\Sdk\Route;
use bookingtime\phpsdkapp\Lib\BasicLib;



/**
 * handle specific API requests
 *
 * @author <bookingtime GmbH>
 */
class ExtraFieldRoute extends Route {



	/**
	 * add an entity
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	array		$requestContent: send this content to api
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function add(array $urlParameter,array $requestContent,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId'],$urlParameter);
		$response=$this->httpClient->request('POST','/organization/'.$urlParameter['organizationId'].'/extraField/add',$requestContent,$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



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
		$this->checkUrlParameters(['organizationId','extraFieldId'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/extraField/'.$urlParameter['extraFieldId'].'/show',[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * identify an entity
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function identify(array $urlParameter,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId','customId'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/extraField/'.$urlParameter['customId'].'/identify',[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * index
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all in a short version | false - shows just a few in a detailed version
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function index(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId','page'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/extraField/'.($all?'indexAll':'index').'/'.($urlParameter['page']?$urlParameter['page']:'1'),[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * filter entities
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all in a short version | false - shows just a few in a detailed version
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function filter(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId','searchQuery','page'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/extraField/'.($all?'filterAll':'filter').'/'.($urlParameter['page']?$urlParameter['page']:'1').'?searchQuery='.$urlParameter['searchQuery'],[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * list entities
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all in a short version | false - shows just a few in a detailed version
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function list(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/extraField/'.($all?'listAll':'list'),[],$expectedResponseCode);
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
		$this->checkUrlParameters(['organizationId','extraFieldId'],$urlParameter);
		$response=$this->httpClient->request('PUT','/organization/'.$urlParameter['organizationId'].'/extraField/'.$urlParameter['extraFieldId'].'/edit',$requestContent,$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * delete an entity
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function delete(array $urlParameter,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId','extraFieldId'],$urlParameter);
		$response=$this->httpClient->request('DELETE','/organization/'.$urlParameter['organizationId'].'/extraField/'.$urlParameter['extraFieldId'].'/delete',[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}
}
