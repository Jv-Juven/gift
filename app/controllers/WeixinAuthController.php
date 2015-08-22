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
		
		if(Session::get('code'))
		{
			$access_token = $session_access_token;
			$refresh_token = $session_refresh_token;
			$open_id = $session_openid;
			$session_openid = $session_scope_userinfo;
		}else{
			$code = Input::get('code');
			$code = Session::put('code', $code);
			$weixin_data = WeChatClient::getAccessTokenByCode($code);
			$access_token = $weixin_data['access_token'];
			$session_access_token = Session::put('session_access_token', $access_token);
			$refresh_token = $weixin_data['refresh_token'];
			$session_refresh_token = Session::put('session_refresh_token', $refresh_token);
			$open_id 	= $weixin_data['openid'];
			$session_openid = Session::put('session_openid', $open_id);
			$scope_userinfo = $weixin_data['scope_userinfo'];
			$session_scope_userinfo = Session::put('session_scope_userinfo',$scope_userinfo);
		}
		$user = WeChatClient::getUserInfoByAuth($access_token, $open_id);
        
		return $user;
	}
}
