<?php 

class NoticePageController extends BaseController{

	//回复条数
	public function notice()
	{
		if(!Sentry::check())
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
		$user_count = ($com_count + $reply_count);

		$officals = OfficalUser::where('user_id','=', $user->id)
								->where('status','=', 0)
								->get();
		$offical_count = count($officals);
		return Response::json(array('errCode'=>0, 'message'=>'返回评论条数和回复条数',
				'user_count' => $user_count,
				'offical_count' => $offical_count
			));
	}

	//话题回复的简讯页—显示头像和昵称
	public function brefUser()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$join_coms = ArticleJoinCom::where('receiver','=',$user->id)
						->where('status','=',0)
						->where('is_delete','=',0)
						->orderBy('created_at','desc')
						->get();
		if( count($join_coms)!=0 )
		{	
			foreach( $join_coms as $com)
			{
				$com_sender = User::find($com->sender_id);
				$com->avatar = $com_sender->avatar;
				$com->username = $com_sender->username;				
			}
		}
		$replys = ArticleJoinReply::where('receiver','=',$user->id)
						->where('status','=',0)
						->where('is_delete','=',0)
						->orderBy('created_at','desc')
						->get();
		if(count($replys) !=0 )
		{
			foreach( $replys as $reply)
			{
				$reply_sender = User::find($reply->sender_id);
				$reply->avatar = $reply_sender->avatar;
				$reply->username = $reply_sender->username;
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回回复者头像和名字',
								'comments'=>$join_coms,
								'replys' => $replys
							));	
	}

	//通知的简讯（官方类）
	public function  brefOffical()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$officals = OfficalUser::where('user_id','=', $user->id)
								->where('is_delete','=', 0)
								->get();
		return Response::json(array('errCode'=>0, 'message'=>'返回官方简讯'));
	}
}