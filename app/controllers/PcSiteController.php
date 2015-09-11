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



	}
}