<?php

namespace bookingtime\phpsdkapp\Sdk\ApiRoute;
use bookingtime\phpsdkapp\Sdk\Route;
use bookingtime\phpsdkapp\Lib\BasicLib;



/**
 * handle specific API requests
 *
 * @author <bookingtime GmbH>
 */
class StatisticRoute extends Route {



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
		$this->checkUrlParameters(['organizationId','statisticId'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/statistic/'.$urlParameter['statisticId'].'/show',[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * index day
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all | false - shows just a few
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function indexDay(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make mock request with dummi content
		if($this->httpClient->getMock()) {
			$response=$this->httpClient->mockRequest('GET','statistic/year/2025/month/10/day/1/indexDay/1',$expectedResponseCode,[
				'class'=>'PAGINATION_LIST',
				'pageCurrent'=>1,
				'pageTotal'=>1,
				'recordFrom'=>1,
				'recordTo'=>0,
				'recordTotal'=>0,
				'recordPerPage'=>25,
				'recordList'=>[]
			],[
				['class'=>'MESSAGE','type'=>'success','parameter'=>NULL,'text'=>''],
			]);
			return $response['content'];
		}

		//make request to API
		$this->checkUrlParameters(['organizationId','year','month','day','page'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/statistic/year/'.$urlParameter['year'].'/month/'.$urlParameter['month'].'/day/'.$urlParameter['day'].'/'.($all?'indexAllDay':'indexDay').'/'.($urlParameter['page']?$urlParameter['page']:'1'),[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * index week
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all | false - shows just a few
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function indexWeek(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make mock request with dummi content
		if($this->httpClient->getMock()) {
			$response=$this->httpClient->mockRequest('GET','statistic/year/2025/week/10/indexWeek/1',$expectedResponseCode,[
				'class'=>'PAGINATION_LIST',
				'pageCurrent'=>1,
				'pageTotal'=>1,
				'recordFrom'=>1,
				'recordTo'=>0,
				'recordTotal'=>0,
				'recordPerPage'=>25,
				'recordList'=>[]

			],[
				['class'=>'MESSAGE','type'=>'success','parameter'=>NULL,'text'=>''],
			]);
			return $response['content'];
		}

		//make request to API
		$this->checkUrlParameters(['organizationId','year','week','page'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/statistic/year/'.$urlParameter['year'].'/week/'.$urlParameter['week'].'/'.($all?'indexAllWeek':'indexWeek').'/'.($urlParameter['page']?$urlParameter['page']:'1'),[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}



	/**
	 * index month
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all | false - shows just a few
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function indexMonth(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make mock request with dummi content
		if($this->httpClient->getMock()) {
			$response=$this->httpClient->mockRequest('GET','statistic/year/2025/month/10/indexMonth/1',$expectedResponseCode,[
				'class'=>'PAGINATION_LIST',
				'pageCurrent'=>1,
				'pageTotal'=>1,
				'recordFrom'=>1,
				'recordTo'=>0,
				'recordTotal'=>0,
				'recordPerPage'=>25,
				'recordList'=>[]

			],[
				['class'=>'MESSAGE','type'=>'success','parameter'=>NULL,'text'=>''],
			]);
			return $response['content'];
		}

		//make request to API
		$this->checkUrlParameters(['organizationId','year','month','page'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/statistic/year/'.$urlParameter['year'].'/month/'.$urlParameter['month'].'/'.($all?'indexAllMonth':'indexMonth').'/'.($urlParameter['page']?$urlParameter['page']:'1'),[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}
}
