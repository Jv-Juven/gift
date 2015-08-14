<?php

class UserController extends BaseController{
	
	protected static $telephone_reg = "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$|17[0-9]{1}[0-9]{8}$/";
	//发送验证码（创瑞短信平台cr6868.com）
	protected function send_message( $user_telephone, $message )
	{
        
	        $argv = array(
	            'name' => '13246860389',
	            'pwd' => 'DDF540A7FC084C226AD472E36037',
	            'sign' => '紫睿科技',
	            'type' => 'pt',
	            'mobile' => $user_telephone,
	            'content' => $message //'您的验证码为：'.$code
	        );

	        $url = 'http://web.cr6868.com/asmx/smsservice.aspx?'.http_build_query( $argv, '', '&' );
        
	        $response = file_get_contents( $url );
	        $return_code = substr( $response, 0, 1 );

	        return $return_code == '0';
	}

	//随机数
	protected function rand()
	{
		return rand(111111,666666);
	}

	//发送注册用的验证码
	public function registerCode()
	{
		Session_start();
		$user_telephone = Input::get('phone');

		if(!preg_match(self::$telephone_reg, $user_telephone) )
			return Response::json(array('errCode'=>1, 'message'=>'手机号码不正确！'));
		
		$phone_is_register = User::where('phone', '=', $user_telephone)->get();
		if(count($phone_is_register) != 0)
			return 	Response::json(array('errCode'=>2, 'message'=>'手机已注册！'));

		//验证码
		$code = $this->rand();
		$message = '您的验证码为：'.$code;
		 // 发送验证码
		if ( !$this->send_message( $user_telephone, $message ) )
		            return Response::json(array( 'error_code' => 3, 'message' => '验证码发送失败' ));		

		 //储存验证信息
		Session::put('telephone', $user_telephone);
		Session::put('code', $code);

		return Response::json(array('errCode'=>0, 'message'=>'发送成功！'));
	}

	//验证码—验证注册验证码
	public function  checkCode()
	{
		Session_start();
		$telephone 	=  Input::get('phone');
		$code 		= Input::get('check_code');

		if(Session::get('phone') != $telephone)
			return Response::json(array('errCode'=>1, 'message'=>'手机号码不正确！'));

		if(Session::get('code') != $code)
			return Response::json(array('errCode'=>2, 'message'=>'验证码不正确！'));

		return Response::json(array('errCode'=>0, 'message'=>'验证通过'));
	}

	//注册—设置密码
	public function register()
	{	
		Session_start();
		$username 	= Input::get('username');
		$password 	= Input::get('password');
		$re_password = Input::get('re_password');

		$data = array(
			'username' 	=> $username,
			'password' 	=> $password,
			're_password'  => $re_password
		);

		$rules = array(
			'username' 	=> 'required|unique:users,username',
			'password'	=>'required|alpha_num|between:6,20',
			're_password'	=>'required|same:password'
		);

		$messages = array(
			'username.required'     	=> 1,
			'password.required' 	   	=> 1,
			're_password.required' 	=> 1,
			'username.unique'        	=> 2,
			'password.alpha_num'  	=> 3,
			'password.between'     	=> 4,
			're_password.same'     	=> 5
		);

		$validation = Validator::make($data, $rules, $messages);
		if($validation->fails())
		{
			$message = $validation->messages()->all();
			if($message[0] == 1)
				return Response::json(array('errCode'=>1, 'message'=>'请填写完整的信息！'));
			if($message[0] == 2)
				return Response::json(array('errCode'=>2, 'message'=>'此用户名已注册！'));
			if($message[0] == 3)
				return Response::json(array('errCode'=>3, 'message'=>'密码只能包含字母和数字！'));
			if($message[0] == 4)
				return Response::json(array('errCode'=>4, 'message'=>'密码长度必须在6到20之间！'));
			if($message[0] == 5)
				return Response::json(array('errCode'=>5, 'message'=>'两次输入的密码不一致！'));
		}

		$user = New User;
		$user->phone 		= Session::get('phone');
		$user->password 	= Hash::make($password);
		$user->username 	= $username;

		if(!$user->save())
			return Response::json(array('errCode'=>6, 'message'=>'注册失败！'));
		
		return Response::json(array('errCode'=>0, 'message'=>'注册成功！'));
	}

	//登录
	public function login()
	{
		$phone 	= Input::get('phone');
		$password 	= Input::get('password');

		if(!preg_match(self::$telephone_reg, $phone) )
			return Response::json(array('errCode'=>1, 'message'=>'手机号码格式不正确！'));
		try{
			$cred = array(
				'phone' 	=> $phone,
				'password'	=> $password
			);
			$user = Sentry::authenticate($cred, false);
		}
		catch( Cartalyst\Sentry\Users\PasswordRequiredException $e ){
			return Response::json(array( 'error_code' => 2, 'message' => '请输入密码' ));
		}catch( Cartalyst\Sentry\Users\UserNotFoundException $e ){
			return Response::json(array( 'error_code' => 3, 'message' => '不存在该用户' ));
		}catch( Cartalyst\Sentry\Users\WrongPasswordException $e ){
			return Response::json(array( 'error_code' => 4, 'message' => '密码错误' ));
		}catch( Exception $e ){
			return Response::json(array( 'error_code' => -1, 'message' => 'Unknown Error' ));
		 }

		 Session::put('user_id', Sentry::getUser()->id);
		 return Response::json(array('errCode'=>0, 'message'=>'登录成功！'));
	}

	public function logout()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'用户未登录！'));
		Sentry::logout();
		Session::forget('user_id');
		return Response::json(array('errCode'=>0, 'message'=>'退出成功！'));
	}

	public function pwdCode()
	{
		Session_start();
		$user_telephone = Input::get('phone');

		if(!preg_match(self::$telephone_reg, $user_telephone) )
			return Response::json(array('errCode'=>1, 'message'=>'手机号码不正确！'));
		
		$phone_is_register = User::where('phone', '=', $user_telephone)->get();
		if(count($phone_is_register) == 0)
			return 	Response::json(array('errCode'=>2, 'message'=>'手机未注册！'));

		//验证码
		$code = $this->rand();
		$message = '您的验证码为：'.$code;
		 // 发送验证码
		if ( !$this->send_message( $user_telephone, $message ) )
		            return Response::json(array( 'error_code' => 3, 'message' => '验证码发送失败' ));		

		 //储存验证信息
		Session::put('reset_telephone', $user_telephone);
		Session::put('reset_code', $code);

		return Response::json(array('errCode'=>0, 'message'=>'发送成功！'));
	}

	//重置密码
	public function pwdReset()
	{	
		Session_start();
		$phone 		= Input::get('phone');
		$check_code 		= Input::get('check_code');
		$password 		= Input::get('password');
		$re_password 		= Input::get('re_password');

		if($phone != Session::get('reset_telephone'))
			return Response::json(array('errCode'=>1,'message'=>'手机号码不正确！'));
		if($check_code != Session::get('reset_code'))
			return Response::json(array('errCode'=>2, 'message' =>'验证码不正确！'));
		if(strlen($password)<6 || strlen($password)>20)
			return Response::json(array('errCode'=>3, 'message'=>'密码长度为6到20之间！'));
		if($password != $re_password)
			return Response::json(array('errCode'=>4, 'messsage' =>'两次输入的密码不一致！'));

		$user = User::where('phone', '=', $phone)->first();
		$user->password = Hash::make($password);

		if(!$user->save())
			return Response::json(array('errCode'=>5, 'message'=>'密码修改失败！'));

		return Response::json(array('errCode'=>0, 'message'=>'密码修改成功！'));
	}
}