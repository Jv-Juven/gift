<?php 

class WeixinAuthController extends BaseController{

	//获取code
	public function code()
	{
		$redirect_uri = "http://gift.zerioi.com/weixin/access_token";
		$scope = "snsapi_userinfo";
		$redirect_url = WeChatClient::getOAuthConnectUri($redirect_uri,'', $scope);
		return Redirect::to($redirect_url);
	}

	public function accessToken()
	{
		$code = Input::get('code');

		return WeChatClient::getAccessTokenByCode($code);
	}
}