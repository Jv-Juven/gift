<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get("/", function(){
	return View::make("index.home");
	// return Response::view("layouts.master");
});

// Route::group(array('prefix' => 'user'),function()
// {
// 	//注册—获取注册页面
// 	Route::get('register','UserPageController@register');
// 	//注册—发送注册验证码
// 	Route::post('register_code','UserController@registerCode');
// 	//注册—验证验证码
// 	Route::post('check_code', 'UserController@checkCode');
// 	//注册—设置密码静态页
// 	Route::get('set_pwd', 'UserPageController@setPwd');
// 	//注册—密码设置
// 	Route::post('register','UserController@register');
// 	//登录—登录静态页
// 	Route::get('login', 'UserPageController@login');
// 	//登录
// 	Route::post('login','UserController@login');
// 	//登出
// 	Route::post('logout', 'UserController@logout');
// 	//获取忘记密码页
// 	Route::get('pwd', 'UserPageController@pwdReset');
// 	//忘记密码—获取验证码
// 	Route::post('pwd_code', 'UserController@pwdCode');
// 	//忘记密码—重置密码
// 	Route::post('pwd', 'UserController@pwdReset');
// });
