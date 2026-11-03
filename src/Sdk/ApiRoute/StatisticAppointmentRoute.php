<?php

namespace bookingtime\phpsdkapp\Sdk\ApiRoute;
use bookingtime\phpsdkapp\Sdk\Route;
use bookingtime\phpsdkapp\Lib\BasicLib;



/**
 * handle specific API requests
 *
 * @author <bookingtime GmbH>
 */
class StatisticAppointmentRoute extends Route {



	/**
	 * list range
	 *
	 * @param	array		$urlParameter: list of url paramerts like ids
	 * @param	boolean	$all: true - shows all | false - shows just a few
	 * @param	integer	$expectedResponseCode: expected http response code for http-client
	 * @return	array		reponse content
	 */
	public function listRange(array $urlParameter,$all,$expectedResponseCode) {
		//check submitted parameters
		BasicLib::checkType('boolean',$all,__METHOD__.'(): all');
		BasicLib::checkType('integer',$expectedResponseCode,__METHOD__.'(): expectedResponseCode');

		//make request to API
		$this->checkUrlParameters(['organizationId','yearStart','monthStart','dayStart','yearEnd','monthEnd','dayEnd'],$urlParameter);
		$response=$this->httpClient->request('GET','/organization/'.$urlParameter['organizationId'].'/statisticAppointment/year/'.$urlParameter['yearStart'].'/month/'.$urlParameter['monthStart'].'/day/'.$urlParameter['dayStart'].'/year/'.$urlParameter['yearEnd'].'/month/'.$urlParameter['monthEnd'].'/day/'.$urlParameter['dayEnd'].'/'.($all?'listAllRange':'listRange'),[],$expectedResponseCode);
		#die(BasicLib::debug($response));
		return $response['content'];
	}
}
