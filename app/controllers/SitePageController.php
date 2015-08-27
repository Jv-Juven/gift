<?php

class SitePageController extends BaseController{

	public function perInfo()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		return Response::json(array('errCode'=>0, 'message'=>'返回用户基本信息','user'=>$user));
	}
}