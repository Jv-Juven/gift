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
		
		if(Session::has('code'))
		{
			Session::forget('code');
			$access_token = Session::get('access_token');
			$refresh_token = Session::get('refresh_token';
			$open_id = Session::get('openid');
			$scope_userinfo = Session::get('scope_userinfo');
		}else{
			$code = Input::get('code');
			$code = Session::put('code', $code);
			$weixin_data = WeChatClient::getAccessTokenByCode($code);
			$access_token = $weixin_data['access_token'];
			Session::put('access_token', $access_token);
			$refresh_token = $weixin_data['refresh_token'];
			Session::put('refresh_token', $refresh_token);
			$open_id 	= $weixin_data['openid'];
			Session::put('openid', $open_id);
			$scope_userinfo = $weixin_data['scope_userinfo'];
			Session::put('scope_userinfo',$scope_userinfo);
		}
		$user = WeChatClient::getUserInfoByAuth($access_token, $open_id);

		return $user;
	}
}