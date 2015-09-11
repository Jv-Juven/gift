<?php

class PcSiteController extends BaseController{

	public function perInfo()
	{
		if(! Sentry::check())
			return View::make('pc.login');
		return View::make('pc.setting');
	}

	public function setInfo()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1,'message'=>'请登录'));
		$data = array(
			'username' 		=> Input::get('username');
			'avatar'		=> Input::get('avatar');
			'gender'		=> Input::get('gender');
			'birthday'		=> Input::get('birthday');
			'constellation'	=> Input::get('constellation');
			'postion'		=> Input::get('postion');
			'info'			=> Input::get('info');
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
}