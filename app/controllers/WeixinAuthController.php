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
		if(!Session::get('code'))
		{
			Session::put('code', Input::get('code'));
			return;
		}
		$code = Input::get('code');
		$weixin_data = WeChatClient::getAccessTokenByCode($code);
		$access_token = $weixin_data['access_token'];
		$refresh_token = $weixin_data['refresh_token'];
		$open_id 	= $weixin_data['openid'];
		$scope_userinfo = $weixin_data['scope_userinfo'];
		$user = WeChatClient::getUserInfoByAuth($access_token, $open_id);
        
		return $user;
	}
}
