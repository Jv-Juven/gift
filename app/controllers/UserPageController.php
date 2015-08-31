<?php

class UserPageController extends BaseController{

	//注册—获取注册页面
	public function register()
	{
		return View::make('register/register');
	}

	//注册—设置密码静态页
	public function setPwd()
	{
		return View::make('register/setPwd');
	}

	//登录—登录静态页
	public function login()
	{
		return View::make('login/login');
	}

	public function pwdReset()
	{
		return View::make('login/resetPsd');
	}
}	
