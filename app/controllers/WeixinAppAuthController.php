<?php 
class WeixinAppAuthController extends BaseController{

	public function storeUserData()
	{	
//		Log::info(Input::get('data'));
		$data =json_decode( Input::get('data') );
	//	return Input::get('data');
		$user =User::where('unionid', '=', $data->unionid)->first();
		if(!isset($user))
        {
            // try{
                $client_user = Sentry::createUser(array(
                    'username'  => $data->nickname,
                    'avatar'    => $data->headimgurl,
                    'gender'    => $data->sex,
                    'email'     => $data->unionid,
                    'password'  => $data->unionid,
                    'openid'    => $data->openid,
                    'unionid'   => $data->unionid,
                    'activated' => '1'
                ));
            // }
            // catch(Cartalyst\Sentry\Users\PasswordRequiredException $e)
            // {
            //     return View::make('errors.missing');
            // }
            // catch(Cartalyst\Sentry\Users\UserExistsException $e)
            // {
            //     return View::make('errors.missing');
            // }
            
            // try{
                $user = Sentry::findUserById($client_user->id);
                Sentry::login($user,false);
            // }
            // catch(Cartalyst\Sentry\Users\LoginRequiredException $e)
            // {
            //     return View::make('errors.missing');
            // }
            // catch(Cartalyst\Sentry\Users\UserNotFoundException $e)
            // {
            //     return View::make('errors.missing');
            // }
            // catch(Cartalyst\Sentry\Users\UserNotActivatedException $e)
            // {
            //     return View::make('errors.missing')
            // }
            return Response::json(array('errCode'=>0, 'message'=>'返回参数','user'=>$user));
        }

        $user = Sentry::findUserById($user->id);
        Sentry::login($user,false);
        
        return Response::json(array('errCode'=>0, 'message'=>'返回参数','user'=>$user));
	}











// 	//获取code
// 	public function code()
// 	{
// 		$redirect_uri = "http://gift.zerioi.com/weixin/access";
// 		$scope = "snsapi_userinfo";
// 		$redirect_url = WeChatClient::getOAuthConnectUri($redirect_uri,'', $scope);
// 		return Redirect::to($redirect_url);
// 	}
// 	public function accessToken()
// 	{
// 		if(Session::get('code') == Input::get('code'))
// 		{
// 			Session::put('code', Input::get('code'));
// 		$code = Input::get('code');
// 		$weixin_data = WeChatClient::getAccessTokenByCode($code);
// 		var_dump($weixin_data);
// 		$access_token = $weixin_data['access_token'];
// 		$refresh_token = $weixin_data['refresh_token'];
// 		$open_id 	= $weixin_data['openid'];
// 		$user = WeChatClient::getUserInfoByAuth($access_token, $open_id);
// //		$client_user = New User;
// //		$client_user->username = $user['nickname'];
// //		$client_user->save();


// 		dd($user);

// 		return Redirect::to('/');
// 		}
// 		Session::put('code',Input::get('code'));
// //      $client_user = New User;
// //		$client_user->username = $user['nickname'];
// //	    $client_user->save();
// 	//	dd($user);
// 		return Redirect::to('/');
// 	}
}
