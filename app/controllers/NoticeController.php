<?php

class NoticeController extends BaseController{

	//删除回复条数
	public function dUserNotice()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$join_coms = ArticleJoinCom::where('receiver','=',$user->id)
						->where('is_delete','=',0)
						->get();
		if( count($join_coms)!=0 )
		{	
			foreach( $join_coms as $com)
			{
				$com->is_delete = 1;
				if( !$com->save())
					return Response::json(array('errCode'=>3, 'message'=>'[服务器错误]删除失败'));
			}
		}
		$replys = ArticleJoinReply::where('receiver','=',$user->id)
						->where('is_delete','=',0)
						->get();
		if(count($replys) !=0 )
		{
			if( $replys as $reply)
			{
				$reply->is_delete = 1;
				if( !$reply->save())
					return Response::json(array('errCode'=>3, 'message'=>'[服务器错误]删除失败'));
			}
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}

	//删除通知中的一条评论
	public function dUserCom()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$com_id = Input::get('com_id');
		if(!isset($com_id))
			return Response::json(array('errCode'=>2,'message'=>'请传入评论的id'));
		$com = ArticleJoinCom::find($com_id);
		if(!isset($com))
			return Response::json(array('errCode'=>3,'message'=>'该评论不存在'));
		$com->is_delete = 1;
		if(!$com->save())
			return Response::json(array('errCode'=>4,'message'=>'［服务器错误］'));

		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}

	//删除通知中的一条回复
	public function dUserReply()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$reply_id = Input::get('reply_id');
		if(!isset($reply_id))
			return Response::json(array('errCode'=>2,'message'=>'请传入评论的id'));
		$reply = ArticleJoinCom::find($reply_id);
		if(!isset($reply))
			return Response::json(array('errCode'=>3,'message'=>'该评论不存在'));
		$reply->is_delete = 1;
		if(!$reply->save())
			return Response::json(array('errCode'=>4,'message'=>'［服务器错误］'));

		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}

	//官方通知详细信息
	public function offical()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$offical_id = Input::get('offical_id');

		if(!isset($offical_id)
			return Response::json(array('errCode'=>2, 'message'=>'请选择需要查看官方详情'));
		$offical = OfficalNotice::find($offical_id);
		if(!isset($offical))
			return Response::json(array('errCode'=>3, 'message'=>'该官方消息不存在'));
		$offical_parts = OfficalNoticePart::where('offical_id','=', $offical->id)
										->orderBy('created_at','asc')
										->get()
		if(count($offical_parts)==0)
			return Response::json(array('errCode'=>4,'message'=>'[数据库没插数据]官方消息没内容'));	
		return Response::json(array('errCode'=>0, 'message'=>'返回官方通知后详细信息'
									'offical'=> $offical,
									'offical_parts' => $offical_parts
			));
	}
	
	//删除全部官方通知
	public function dOfficalAll()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$officals = OfficalNotice::where('is_delete','=', 0);
		if(count($officals) != 0)
		{
			foreach( $officals as $offical )
			{
				$offical->is_delete = 1;
				if(!$offical->save())
					return Response::json(array('errCode'=> 2, 'message'=>'[数据库错误]删除失败')); 
			}
		}

		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}

	//删除一条官方通知
	public function dOffical()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$offical_id = Input::get('offical_id');

		if(!isset($offical_id)
			return Response::json(array('errCode'=>2, 'message'=>'请选择需要删除的官方详情'));
		$offical = OfficalNotice::find($offical_id);
		if(!isset($offical))
			return Response::json(array('errCode'=>3, 'message'=>'该官方消息不存在'));

		$offical->is_delete = 1;
		if(!$offical->save())
			return  Response::json(array('errCode'=>4,'message'=>'删除失败'));

		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}


}