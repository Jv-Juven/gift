<?php

class WeixinController extends BaseController{
	
	protected $token = 'ziruikeji';

	protected function check_signature()
	{
		$signature = Input::get('signature');
		$timestamp = Input::get('timestamp');
		$nonce	 = Input::get('nonce');

		$tmpArr = array( self::$token, $timestamp, $nonce);
		sort( $tmpArr, SORT_STRING);
		$tmpStr = implode($tmpArr);

		return $tmpStr == $signature;	
	}

	public function repsonse_token()
	{
		$repsonse_text = 'Error';

		if(self::check_signature())
		{
			$repsonse_text = Input::get('echostr');
		};

		return Response::make($repsonse_text);
	}

	public function response_message()
	{
		return Response::make('success');
	}
	
}