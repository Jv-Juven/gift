<?php

class UserController extends BaseController{
	
	// protected static $telephone_reg = "/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$|17[0-9]{1}[0-9]{8}$/";
	// //发送验证码（创瑞短信平台cr6868.com）
	// protected function send_message( $user_telephone, $message )
	// {
        
	//         $argv = array(
	//             'name' => '13246860389',
	//             'pwd' => 'DDF540A7FC084C226AD472E36037',
	//             'sign' => '紫睿科技',
	//             'type' => 'pt',
	//             'mobile' => $user_telephone,
	//             'content' => $message //'您的验证码为：'.$code
	//         );

	//         $url = 'http://web.cr6868.com/asmx/smsservice.aspx?'.http_build_query( $argv, '', '&' );
        
	//         $response = file_get_contents( $url );
	//         $return_code = substr( $response, 0, 1 );

	//         return $return_code == '0';
	// }

	//随机数
	protected function rand()
	{
		return rand(111111,666666);
	}

	//发送注册用的验证码
	public function registerCode()
	{
		Session_start();
		$email = Input::get('email');

		// if(!preg_match(self::$telephone_reg, $user_telephone) )
		// 	return Response::json(array('errCode'=>1, 'message'=>'手机号码不正确！'));
		$messages = array(
			'required' 	=> 1,
			'email'		=> 2,
			'unique'	=> 3
			);
		$validation = Validator::make(
			array('email' => $email),
			array('email' => 'required|email|unique:users,email'),
			$messages
			);
		if($validation->fails())
		{
			$msg = $validation->messages()->all();
			if($msg[0] ==1 )
				return Response::json(array('errCode'=>1, 'message'=>'请填写邮箱！'));
			if($msg[0] ==2 )
				return Response::json(array('errCode'=>2, 'message'=>'邮箱格式不正确！'));
			if($msg[0] ==3 )
				return Response::json(array('errCode'=>3, 'message'=>'此邮箱已注册！'));
		}
		//  // 发送验证码
		// if ( !$this->send_message( $user_telephone, $message ) )
		//             return Response::json(array( 'error_code' => 3, 'message' => '验证码发送失败' ));	
		//验证码
		$code = $this->rand();
		//发送邮件
		Mail::send('emails/token',array('token' => $code),function($message) use ($email)
		{
			$message->to($email,'')->subject('礼拉欢迎您!');
		});	
		 //储存验证信息
		Session::put('email', $email);
		Session::put('code', $code);

		return Response::json(array('errCode'=>0, 'message'=>'发送成功','code'=>$code));
	}

	//验证码—验证注册验证码
	public function  checkCode()
	{
		Session_start();
		$email 		= Input::get('email');
		$code 		= Input::get('check_code');

		if(Session::get('email') != $email)
			return Response::json(array('errCode'=>1, 'message'=>'邮箱不正确！'));

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
		// $re_password = Input::get('re_password');

		$data = array(
			'username' 	=> $username,
			'password' 	=> $password,
			// 're_password'  => $re_password
		);

		$rules = array(
			'username' 	=> 'required|unique:users,username',
			'password'	=>'required|between:6,20',
			// 're_password'	=>'required|same:password'
		);

		$messages = array(
			'username.required'     	=> 1,
			'password.required' 	   	=> 1,
			// 're_password.required' 		=> 1,
			'username.unique'        	=> 2,
			// 'password.alpha_num'  		=> 3,
			'password.between'    	 	=> 3,
			// 're_password.same'     		=> 5
		);

		$validation = Validator::make($data, $rules, $messages);
		if($validation->fails())
		{
			$message = $validation->messages()->all();
			if($message[0] == 1)
				return Response::json(array('errCode'=>1, 'message'=>'请填写完整的信息！'));
			if($message[0] == 2)
				return Response::json(array('errCode'=>2, 'message'=>'此用户名已注册！'));
			// if($message[0] == 3)
				// return Response::json(array('errCode'=>3, 'message'=>'密码只能包含字母和数字！'));
			if($message[0] == 3)
				return Response::json(array('errCode'=>3, 'message'=>'密码长度必须在6到20之间！'));
			// if($message[0] == 5)
				// return Response::json(array('errCode'=>5, 'message'=>'两次输入的密码不一致！'));
		}

		$user = Sentry::createUser(array(
			 'email'=>Session::get('email'),
			'password'=>$password,
			'activated'=>true,
			));

		return Response::json(array('errCode'=>0, 'message'=>'注册成功','id'=>$user->id));
		
		// $user = New User;
		// $user->email 		= Session::get('email');
		// $user->password 	= Hash::make($password);
		// $user->username 	= $username;
		// if(!$user->save())
		// 	return Response::json(array('errCode'=>6, 'message'=>'注册失败！'));
		// return Response::json(array('errCode'=>0, 'message'=>'注册成功！'));
	}

	//登录
	public function login()
	{
		$email 		= Input::get('email');
		$password 	= Input::get('password');

		$validation = Validator::make(
			array('email' => $email),
			array('email' => 'email')
			);
		if($validation->fails())
			return Response::json(array('errCode'=>1, 'message'=>'邮箱格式不正确！'));
		
		try{
			$cred = array(
				'email' 		=> $email,
				'password'	=> $password
			);
			$user = Sentry::authenticate($cred, false);
		}
		catch( Cartalyst\Sentry\Users\PasswordRequiredException $e ){
			return Response::json(array( 'errCode' => 2, 'message' =>'没有填写密码'));
		}catch( Cartalyst\Sentry\Users\WrongPasswordException $e ){
			return Response::json(array( 'errCode' => 3, 'message' =>'密码不正确'));
		}catch( Exception $e ){
			return Response::json(array( 'errCoode' => 4, 'message' =>'密码或邮箱不正确'));
		 }
		 Session::put('user_id', Sentry::getUser()->id);
		 return Response::json(array('errCode'=>0, 'message'=>'登录成功！',
		 								'intendedUrl'=>Session::pull('url.intended', '/'),
		 								'user'=>$user));
	}

	public function logout()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'用户未登录！'));
		Sentry::logout();
		Session::forget('user_id');
		return Response::json(array('errCode'=>0, 'message'=>'退出成功！'));
	}

	//忘记密码——获取重置验证码
	public function pwdCode()
	{
		Session_start();
		$email = Input::get('email');

		$validation = Validator::make(
			array('email' => $email),
			array('email' => 'email')
			);
		if($validation->fails())
			return Response::json(array('errCode'=>1, 'message'=>'邮箱格式不正确！'));
		
		$user_email = User::where('email', '=', $email)->get();
		if(count($user_email) == 0)
			return 	Response::json(array('errCode'=>2, 'message'=>'该邮箱未注册！'));

		// 根据 email 查找用户
		$user = Sentry::findUserByLogin($email);
		//获取重置密码
		$code = $user->getResetPasswordCode();
		//发送邮件
		Mail::send('emails/token',array('token' => $code),function($message) use ($email)
		{
			$message->to($email,'')->subject('礼拉欢迎您!');
		});	
		 //储存验证信息
		Session::put('reset_email', $email);
		Session::put('reset_code', $code);

		return Response::json(array('errCode'=>0, 'message'=>'发送成功！','code'=>$code));
	}

	//重置密码
	public function pwdReset()
	{	
		Session_start();
		$email 			= Input::get('email');
		$check_code 		= Input::get('check_code');
		$password 		= Input::get('password');
		// $re_password 		= Input::get('re_password');

		if($email != Session::get('reset_email'))
			return Response::json(array('errCode'=>1,'message'=>'邮箱不正确！'));
		if($check_code != Session::get('reset_code'))
			return Response::json(array('errCode'=>2, 'message' =>'验证码不正确！'));
		if(strlen($password)<6 || strlen($password)>20)
			return Response::json(array('errCode'=>3, 'message'=>'密码长度为6到20之间！'));
		// if($password != $re_password)
			// return Response::json(array('errCode'=>4, 'messsage' =>'两次输入的密码不一致！'));

		try{
			$user = Sentry::findUserByLogin($email);
			if($user->checkResetPasswordCode($check_code))
			{
				if($user->attemptResetPassword($check_code,$password))
				{
					return Response::json(array('errCode'=>0, 'message'=>'密码修改成功！'));
				}else{
					return Response::json(array('errCode'=>5, 'message'=>'密码修改失败！'));
				}
			}else{
				return Response::json(array('errCode'=>6, 'message'=>'密码无效！'));
			}
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Response::json(array('errCode'=>7, 'message'=>'用户不存在！'));
		}
		// $user = User::where('email', '=', $email)->first();
		// $user->password = Hash::make($password);
		// if(!$user->save())
		// 	return Response::json(array('errCode'=>5, 'message'=>'密码修改失败！'));
		// return Response::json(array('errCode'=>0, 'message'=>'密码修改成功！'));
	}

	//更新个人信息
	public function update()
	{
		
	}




}