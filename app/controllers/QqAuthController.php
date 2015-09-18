<?php 

class QqAuthController extends BaseController{

	private $appid = '101250808';
    private $appsecret = '8fa68d1e497d7e2759afa38fbd24a545';
	private $redirect_uri = "http://gift.zerioi.com/qq/web_access";
	
	private static function get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        # curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!curl_exec($ch))
        {
            error_log(curl_error($ch));
            $data = '';
        }
        else
        {
            $data = curl_multi_getcontent($ch);
        }
        curl_close($ch);

        return $data;
    }


    //1、用户同意授权，获取code。
    public function getOAuthConnectUri($redirect_uri, $state = '', $scope = 'get_user_info')
    {
        $redirect_uri = urlencode($redirect_uri);
        $res = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id={$this->appid}&redirect_uri={$redirect_uri}&scope=$scope&state=1";

        return $res;
    }
    //2、通过code换取网页授权access_token
     public function getAccessTokenByCode($code)
    {
    	$redirect_uri = urlencode($this->redirect_uri);
    	$url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$this->appid}&client_secret={$this->appsecret}&code={$code}&redirect_uri={$redirect_uri}";
        $res = self::get($url);

        return $res;
    }
    //3.刷新access_token（如果需要）
    public function refreshAccessToken($refresh_token)
    {
    	$url = "https://graph.qq.com/oauth2.0/token?grant_type=refresh_token&client_id={$this->appid}&client_secret={$this->appsecret}&refresh_token={$refresh_token}";
        $res = json_decode(self::get($url), TRUE);

        return $res;
    }

    //通过Access Token来获取用户的OpenID
    public function getOpenidByAccessToken($access_token)
    {
    	$url = "https://graph.qq.com/oauth2.0/me?access_token={$access_token}";
    	$res = self::get($url);
    	return $res;
    }

    //4.拉取用户信息(需scope为 get_user_info)
    public function getUserInfoByOpenid($access_token,$openid)
    {
    	$url = "https://graph.qq.com/user/get_user_info?access_token={$access_token}&oauth_consumer_key={$this->appid}&openid={$openid}";
        $res = json_decode(self::get($url), TRUE);

        return $res;
    }

    // 从字符串中获取openid
    public function getOpenidFromString($string)
    {
    	// return substr($string,45,32);
        $string = str_replace('callback(', '', $string);
        $string = str_replace(');', '', $string);
        $string = json_decode($string);
        return $string->openid;
    }

    //获取code
    public function code()
    {
        $redirect_uri = "http://gift.zerioi.com/qq/web_access";
        $scope = "get_user_info";
        $redirect_url = $this->getOAuthConnectUri($redirect_uri,'', $scope);
        return Redirect::to($redirect_url);
    }

    public function accessToken()
    {   
        if(Sentry::check())
        {
            return Redirect::to('/home')->with(array('user'=>Sentry::getUser()));
        }
        // Session::put('code', Input::get('code'));
        $code = Input::get('code');
        $data = $this->getAccessTokenByCode($code);
        $data = StaticController::stringToArray($data);
        $access_token = $data['access_token'];
        $refresh_token = $data['refresh_token'];
        
        $data_of_openid = $this->getOpenidByAccessToken($access_token);
        $openid = $this->getOpenidFromString($data_of_openid);
        
        $user = User::where('qq_id','=', $openid)->first();
        if(!isset($user))
        {
            // try{
                $user = $this->getUserInfoByOpenid($access_token, $openid);
                $client_user = Sentry::createUser(array(
                    'username'  => $user['nickname'],
                    'avatar'    => $user['figureurl'],
                    'gender'    => $user['gender'],
                    'email'     => $openid,
                    'password'  => $openid,
                    'qq_id'     => $openid,
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
            return Redirect::to('/home')->with(array('user'=>$user));
        }

        $user = Sentry::findUserById($user->id);
        Sentry::login($user,false);
        
        return Redirect::to('/home')->with(array('user'=>$user));
    } 

    //移动端
    public function storeUserData()
    {   
		if(Sentry::check())
		{
			return Response::json(array('errCode'=>0,'message'=>'已登录','user'=>Sentry::getUser()));
		}
		// Log::info(Input::get('data'));
		//return Input::get('data');
		$data =json_decode(Input::get('data')) ;
        $user = User::where('openid', '=', $data->openid)->first();
        if(!isset($user))
        {
            // try{
                $client_user = Sentry::createUser(array(
                    'username'  => $data->nickname,
                    'avatar'    => $data->figureurl,
                    'gender'    => $data->gender,
                    'email'     => $data->openid,
                    'password'  => $data->openid,
                    'qq_id'     => $data->openid,
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
            return Response::json(array('errCode'=>0, 'message'=>'用户返回参数','user'=>$user));
        }
        $user = Sentry::findUserById($user->id);
        Sentry::login($user,false);
        
        return Response::json(array('errCode'=>0, 'message'=>'用户返回参数','user'=>$user));
    }
}
