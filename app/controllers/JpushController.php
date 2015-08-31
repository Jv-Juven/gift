<?php

use JPush\Model as M;
use JPush\JPushClient;
use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;

class JpushController extends BaseController{
	
	public static function iosPush( $user ,$user_info)
	{
		$br = '<br/>';
		$client = new JPushClient($app_key, $master_secret);

		try {
		    $result = $client->push()
		        ->setPlatform(M\platform('ios'))
		        ->setAudience(M\audience(M\alias(array($user->id))))
		        ->setNotification(M\ios($user_info))
		        ->send();
		    //测试用
		    // echo 'Push Success.' . $br;
		    // echo 'sendno : ' . $result->sendno . $br;
		    // echo 'msg_id : ' .$result->msg_id . $br;
		    // echo 'Response JSON : ' . $result->json . $br;
		} catch (APIRequestException $e) {
		   
			return Response::json(array('errCode'=>1,'message'=>
					'Push Fail.' . $br.
					'Http Code : ' . $e->httpCode . $br.
					'code : ' . $e->code . $br.
					'message : ' . $e->message . $br.
					'Response JSON : ' . $e->json . $br.
					'rateLimitLimit : ' . $e->rateLimitLimit . $br.
					'rateLimitRemaining : ' . $e->rateLimitRemaining . $br.
					'rateLimitReset : ' . $e->rateLimitReset . $br
				));
		    // echo 'Push Fail.' . $br;
		    // echo 'Http Code : ' . $e->httpCode . $br;
		    // echo 'code : ' . $e->code . $br;
		    // echo 'message : ' . $e->message . $br;
		    // echo 'Response JSON : ' . $e->json . $br;
		    // echo 'rateLimitLimit : ' . $e->rateLimitLimit . $br;
		    // echo 'rateLimitRemaining : ' . $e->rateLimitRemaining . $br;
		    // echo 'rateLimitReset : ' . $e->rateLimitReset . $br;
		} catch (APIConnectionException $e) {
		    return Response::json(array('errCode'=>2, 'message'=>
		    				'Push Fail.' . $br.
		    				'message' . $e->getMessage() . $br
		    	));
		    // echo 'Push Fail.' . $br;
		    // echo 'message' . $e->getMessage() . $br;
		}
	}
}