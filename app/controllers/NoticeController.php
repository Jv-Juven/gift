<?php

class NoticeController extends BaseController{

	//回复条数
	public function notice()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		//没有查看的评论条数和回复条数
		$join_coms = ArticleJoinCom::where('receiver','=',$user->id)
						->where('status','=',0)
						->where('is_delete','=',0)
						->get();
		$com_count = count($join_coms);
		$replys = ArticleJoinReply::where('receiver','=',$user->id)
						->where('status','=',0)
						->where('is_delete','=',0)
						->get();
		$reply_count = count($replys);
		$count = ($com_count + $reply_count);
		return Response::json(array('errCode'=>0, 'message'=>'返回评论条数和回复条数',
				'count' => $count,
			));
	}

	//回复消息的简讯页—显示头像和昵称
	public function brefNew()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		
	}

	//回到参与评论页面
	public function joinCom()
	{
		

	}

}