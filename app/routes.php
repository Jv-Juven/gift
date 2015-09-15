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
// Route::get("/", function (){
// 	return Response::view("index.userCenter");
// });	

//首页模块
Route::group(array('prefix' => 'home'),function(){
	//礼品详情页
	Route::get('gift_detail', 'HomePageController@giftDetail');
	//喜欢详情页
	Route::get('like', 'HomePageController@like');
	//专题
	Route::get('topic', 'HomePageController@topic');
	//用户收藏
	Route::group(array('before'=>'auth.user.isIn'), function(){
		//收藏礼品
		Route::post('collection','HomeController@collection');
		//收藏专题
		Route::post('topicCollection','HomeController@topicCollection');
	});
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
	//分类标签
	Route::get('label','ElectionPageController@label');
	//根据用户搜索关键字绚丽
	Route::post('selection', 'ElectionController@selectByWord');
	//通过标签搜索
	Route::post('selection_by_label','ElectionController@selectByLabel');
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
		//收藏话题
		Route::post('article_collection','ArticleController@articleCollection');
		//收藏参与话题
		Route::post('join_collection','ArticleController@joinCollection');
		//参与话题评论
		Route::post('comment','ArticleController@comment');
		//参与话题回复
		Route::post('reply','ArticleController@reply');
		//删除评论
		Route::post('dcomment', 'ArticleController@dcomment');
		//删除回复
		Route::post('dreply', 'ArticleController@dreply');
		//编辑话题
		Route::post('edit', 'ArticleController@edit');
		//发表参与话题
		Route::post('issue','ArticleController@issue');
		//删除话题
		Route::post('darticle', 'ArticleController@dArticle');
	});
});

//我的
Route::group(array('prefix'=>'mime','before'=>'auth.user.isIn'), function(){
	//我参与的话题
	Route::get('join_article', 'MimePageController@joinArticle');
	//我喜欢的礼品
	Route::get('like_gift', 'MimePageController@likeGift');
});
	

//设置
Route::group(array('prefix'=>'site','before'=>'auth.user.isIn'),function(){
	//获取个人资料
	Route::get('per_info','SitePageController@perInfo');
	//消息推送
	Route::post('push_message','SiteController@pushMessage');
	//更新个人资料
	Route::post('site/per_info','SiteController@perInfo');
});
	

//通知
Route::group(array('prefix'=>'notice'),function(){
	//获取通知条数
	Route::get('/', 'NoticePageController@notice');
	//通知的简讯(用户类)
	Route::get('bref_user', 'NoticePageController@brefUser');
	//删除全部回复
	Route::post('d_user', 'NoticeController@dUserNotice');
	//删除回复中的一条评论
	Route::post('d_user_com', 'NoticeController@dUserCom');
	//删除回复中的一条回复
	Route::post('d_user_reply', 'NoticeController@dUserReply');
	//通知的简讯(官方类)
	Route::get('bref_offical', 'NoticePageController@brefOffical');
	//官方通知详细信息
	Route::post('offical','NoticeController@offical');
	// 删除一条官方通知
	Route::post('d_offical', 'NoticeController@dOffical');
	//删除全部通知
	Route::post('d_offical_all', 'NoticeController@dOfficalAll');
});

//七牛
Route::get('qiniu', 'UploadController@getUpToken');
Route::get('qiniu/app', 'UploadController@getAppUpToken');
Route::post('/qiniu/delete', 'UploadController@deletePicture');

//后台管理
Route::controller('/login', 'AdminController');
//微信认证登录
Route::group(array('prefix' =>'weixin'), function(){
	//app端	
	Route::post('weixin_data', 'WeixinAppAuthController@storeUserData');
	//web端
	Route::get('web_code', 'WeixinWebAuthController@code');
	Route::get('web_access', 'WeixinWebAuthController@accessToken');
});


// Route::get('test','QqAuthController@getOpenidFromString');


Route::get('extract','MysqlController@extractData');
Route::get('insert', 'MysqlController@insertData');

//<-----------------------PC端路由--------------------->

//QQ授权登录
Route::group(array('prefix'=>'qq'), function(){
	//app端
	Route::post('qq_data','QqAuthController@storeUserData');
	//web端
	Route::get('web_code', 'QqAuthController@code');
	Route::get('web_access', 'QqAuthController@accessToken');
});

//首页模块
Route::group(array('prefix' => 'pc_home'),function(){
	//首页静态
	Route::get('/','PcHomePageController@home');
	//甑选推荐
	Route::get('recommend', 'PcHomePageController@recommend');
	//专题
	Route::get('topic', 'PcHomePageController@topic');
	//热门话题
	Route::get('article', 'PcHomePageController@article');
});

//详情页路由
Route::group(array('prefix' => 'detail'), function(){
	//专题详情页
	Route::get('topic','PcDetailController@topicDetail');
	//话题详情页-文章
	Route::get('article','PcDetailController@articleDetail');
	//话题页中参与话题简讯
	Route::get('bre_join','PcDetailController@brefJoin');
	//参与话题详情
	Route::get('join_detail','PcDetailController@joinDetail');
	//获取评论
	Route::get('join_com','PcDetailController@joinCom')
});

//选礼
Route::group(array('prefix'=>'pc_election'),function(){
	//分类标签
	Route::get('label','PcElectionController@label');
	//通过标签搜索
	Route::post('selection_by_label','PcElectionController@selectByLabel');
});

//我喜欢的
Route::group(array('prefix'=>'pc_mine'),function(){
	//个人中心
	Route::get('/', 'PcMimeController@userCenter');
	//个人中心设置
	Route::get('mine', 'PcMimeController@mineCenter');
	//我参与的话题
	Route::get('join_article', 'PcMimeController@joinArticle');
	//我喜欢的礼品
	Route::get('like_gift', 'PcMimeController@likeGift');
	//修改名字
	Route::post('set_name', 'PcMimeController@setName');
	//更换头像
	Route::post('set_avatar', 'PcMimeController@setAvatar');
	//更换签名
	Route::post('set_sign', 'PcMimeController@setSign');
	//设置个人信息
	Route::post('set_info', 'PcMimeController@setInfo');
});

//话题／参与话题/礼品收藏与app端完全一样
//ArticleController/HomeController


// //个人中心设置
// Route::get('site', 'PcSiteController@perInfo');
// Route::post('site', 'PcSiteController@setInfo');

Route::get('test','HomePageController@giftDetail');

