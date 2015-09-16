<?php

//<-----------------------PC端路由--------------------->

Route::get('pc/login','PcHomePageController@login');
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
	Route::get('join_com','PcDetailController@joinCom');
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
