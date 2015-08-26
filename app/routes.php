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
//礼品展示
Route::get('/', 'HomePageController@showWelcome');

//首页模块
Route::group(array('prefix' => 'home'),function(){
	//礼品详情页
	Route::get('gift_detail', 'HomePageController@giftDetail');
	//喜欢详情页
	Route::get('like', 'HomePageController@like');
	//专题
	Route::get('topic', 'HomePageController@topic');
	//用户收藏
	// Route::group(array('before'=>'auth.user.isIn'), function(){
		//收藏
		Route::post('collection','HomeController@collection');
	// });
});

Route::controller('/login', 'AdminController');

Route::group(array('prefix' =>'weixin'), function(){
	
	Route::get('/', 'WeixinController@valid');
	Route::get('test', 'WeixinController@responseMsg');
	Route::get('code', 'WeixinAuthController@code');
	Route::get('access', 'WeixinAuthController@accessToken');
});

Route::group(array('prefix' => 'user'),function()
{
	//注册—获取注册页面
	Route::get('register','UserPageController@register');
	//注册—发送注册验证码
	Route::post('register_code','UserController@registerCode');
	//注册—验证验证码
	Route::post('check_code', 'UserController@checkCode');
	//注册—设置密码静态页
	Route::get('set_pwd', 'UserPageController@setPwd');
	//注册—密码设置
	Route::post('register','UserController@register');
	//登录—登录静态页
	Route::get('login', 'UserPageController@login');
	//登录
	Route::post('login','UserController@login');
	//获取忘记密码页
	Route::get('pwd', 'UserPageController@pwdReset');
	//忘记密码—获取验证码
	Route::post('pwd_code', 'UserController@pwdCode');
	//忘记密码—重置密码
	Route::post('pwd', 'UserController@pwdReset');
	//登出
	Route::post('logout', array('before'=>'auth.user.isIn','UserController@logout'));
});

//选礼
Route::group(array('prefix'=>'election'),function(){
	//选礼首页—根据用户输入来筛选
	Route::get('/','ElectionPageController@election');
	//根据用户搜索关键字绚丽
	Route::post('selection', 'ElectionController@select');
	//根据价格/场合/个性/对象
	Route::post('price','ElectionController@price');
	//根据场合
	Route::post('scene', 'ElectionController@scene');
	//根据个性
	Route::post('charactor', 'ElectionController@charactor');
	//对象 
	Route::post('object', 'ElectionController@object');
});

//圈子
Route::group(array('prefix'=>'article'),function(){
	//热门话题
	Route::get('/','ArticlePageController@hotArticle');
	//官方话题
	Route::get('offical', 'ArticlePageController@officalArticle');
	//话题详情
	Route::get('detail', 'ArticlePageController@detail');
	//参与话题的详情
	Route::get('join_detail', 'ArticlePageController@involve');
	// 测试用：Route::post('comment','ArticleController@comment');
	// 测试用：Route::post('reply','ArticleController@reply');
	Route::group(array('before'=>'auth.user.isIn'),function(){
		//参与话题评论
		Route::post('comment','ArticleController@comment');
		//参与话题回复
		Route::post('reply','ArticleController@reply');
		//删除评论
		Route::post('dcomment', 'ArticleController@dcomment');
		//删除回复
		Route::post('dreply', 'ArticleController@dreply');
	});

});