<?php

class SiteController extends BaseController{

	//个人设置
	public function perInfo()
	{
		$user_id = Input::get('user_id');
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(1);
		// $info = array('username'=>'small-tiger');
		$info = Input::get('info');
		if(empty($info))
			return Response::json(array('errCode'=>2, 'message'=>'请选择你要修改信息'));
		foreach($info as $key=>$value)
		{
			$user->$key = $value;
			if(!$user->save())
				return Response::json(array('errCode'=>3, 'message'=>'[数据库失败]个人信息修改失败'));
		}
		return Response::json(array('errCode'=>0, 'message'=>'个人信息修改成功'));
	}
}