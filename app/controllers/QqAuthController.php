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
    	$url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$this->appid}&client_secret={$this->appsecret}&code={$code}&state=&redirect_uri={$redirect_uri}";
        $res = json_decode(self::get($url), TRUE);

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
    	$res = json_decode(self::get($url), TRUE);
    	return $res;
    }

    //4.拉取用户信息(需scope为 snsapi_userinfo)
    public function getUserInfoByOpenid($access_token,$openid)
    {
    	$url = "https://graph.qq.com/user/get_user_info?access_token={$access_token}&oauth_consumer_key={$this->appid}&openid={$openid}";
        $res = json_decode(self::get($url), TRUE);

        return $res;
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
        // Session::put('code', Input::get('code'));
        $code = Input::get('code');
        $data = $this->getAccessTokenByCode($code);
        $access_token = $data['access_token'];
        $refresh_token = $data['refresh_token'];
        $data_of_openid = $this->getOpenidByAccessToken($access_token);
        $open_id = $data_of_openid['openid'];
        $user = $this->getUserInfoByOpenid($access_token, $open_id);
        dd($user);
        if(!isset($unionid_user))
        {
            // try{
                $client_user = Sentry::createUser(array(
                    'username'  => $user['nickname'],
                    'avatar'    => $user['headimgurl'],
                    'gender'    => $user['sex'],
                    'email'     => $user['unionid'],
                    'password'  => $user['unionid'],
                    'openid'    => $user['openid'],
                    'unionid'   => $user['unionid'],
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
            return Redirect::to('/')->with(array('user'=>$user));
        }

        $user = Sentry::findUserById($unionid_user->id);
        Sentry::login($user,false);
        
        return Redirect::to('/')->with(array('user'=>$user));
    } 
}