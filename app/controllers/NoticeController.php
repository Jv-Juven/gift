<?php

class NoticeController extends BaseController{

	public function notice()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
	}
}