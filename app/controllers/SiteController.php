<?php

class SiteController extends BaseController{

	//个人设置
	public function perInfo()
	{
		// $user = Sentry::findUserById(4);
		// Sentry::login($user,false);
		// Sentry::logout();
		$type = Input::get('type');
		if($type == 0)
		{
			$user_id = Input::get('user_id');
			if(!isset($user_id))
				return Response::json(array('errCode'=>1,'message'=>'请传入user_id'));
		}
		//0=没有登录,1=登录
		if($type == 1)
		{
			if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
			$user_id = Sentry::getUser()->id;
		}

		$data = array(
			'avatar'	=> Input::get('avatar'),
			'username' 	=> Input::get('username'),
			'gender' 	=> Input::get('gender'),
			'birthday' 	=> Input::get('birthday'),
			'postion' 	=> Input::get('postion')
		);
		$data = array_filter($data);
		
		if(count($data) != 0)
		{
			foreach($data as $key=>$value)
			{
				$user = User::find($user_id);
				$user->$key = $value;
				if(!$user->save())
					return Response::json(array('errCode'=>3,'message'=>'[数据库错误]修改信息失败，请重新个填写'));
			}		
		}
		return Response::json(array('errCode'=>0, 'message'=>'个人信息修改成功'));
	}

	public function pushMessage()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>10, 'message' => '请登录'));
		Sentry::login(Sentry::findUserById(5), false);
		$user = Sentry::getUser();
		// $user = User::find(1);
		$push_status = PushStatus::where('user_id', $user->id)->first();
		
		if(count($push_status) == 0 )
		{
			$push_status = new PushStatus;
			$push_status->user_id = $user->id;
			$push_status->status = 1;
			if(!$push_status->save())
				return Response::json(array('errCode'=>1,'message'=>'［数据库错误］开启消息推送失败'));
			return Response::json(array('errCode'=>0,'message'=>'开启消息推送'));
		}
		
		if($push_status->status == 1)
		{
			$push_status->status = 0;
			if(!$push_status->save())
				return Response::json(array('errCode'=>2,'message'=>'［数据库错误］开启消息推送失败'));
			return Response::json(array('errCode'=>0,'message'=>'开启消息推送'));
		}

		if($push_status->status == 0)
		{
			$push_status->status = 1;
			if(!$push_status->save())
				return Response::json(array('errCode'=>3,'message'=>'［数据库错误］开启消息推送失败'));
			return Response::json(array('errCode'=>0,'message'=>'开启消息推送'));
		}
	}
}