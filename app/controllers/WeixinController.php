<?php

class WeixinController extends BaseController{
	
	protected $token = 'ziruikeji';

	private function checkSignature()
	{
		// you must define TOKEN by yourself
		if (!defined($TOKEN)) {
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

	public function responseMsg()
	{
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

		//extract post data
		if (!empty($postStr)){
		/* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
		   the best way is to check the validity of xml by yourself */
		libxml_disable_entity_loader(true);
		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		$fromUsername = $postObj->FromUserName;
		$toUsername = $postObj->ToUserName;
		$keyword = trim($postObj->Content);
		$time = time();
		$textTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[%s]]></MsgType>
		<Content><![CDATA[%s]]></Content>
		<FuncFlag>0</FuncFlag>
		</xml>";             
	if(!empty( $keyword ))
	{
		$msgType = "text";
		$contentStr = "Welcome to wechat world!";
		$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
		echo $resultStr;
		}else{
			echo "Input something...";
		}
	}else{
		echo "";
		exit;
		}
	}

	public function valid()
	{
		$echoStr = Input::get('echostr');

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