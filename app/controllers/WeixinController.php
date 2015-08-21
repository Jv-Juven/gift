<?php

class WeixinController extends BaseController{
	
	protected $token = 'ziruikeji';

	private function checkSignature()
	{
		// you must define TOKEN by yourself
		if (!defined($token)) {
			throw new Exception('TOKEN is not defined!');
		}
		
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
				
		$token = $token;
		$tmpArr = array($token, $timestamp, $nonce);
		// use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	public function valid()
	{
		$echoStr = $_GET["echostr"];

		//valid signature , option
		if($this->checkSignature()){
			echo $echoStr;
			exit;
		}
	}
	// protected function check_signature()
	// {
	// 	$signature = Input::get('signature');
	// 	$timestamp = Input::get('timestamp');
	// 	$nonce	 = Input::get('nonce');

	// 	$tmpArr = array( self::$token, $timestamp, $nonce);
	// 	sort( $tmpArr, SORT_STRING);
	// 	$tmpStr = implode($tmpArr);

	// 	return $tmpStr == $signature;	
	// }

	// public function repsonse_token()
	// {
	// 	$repsonse_text = 'Error';

	// 	if(self::check_signature())
	// 	{
	// 		$repsonse_text = Input::get('echostr');
	// 	};

	// 	return Response::make($repsonse_text);
	// }

	// public function response_message()
	// {
	// 	return Response::make('success');
	// }
	
}