<?php 

class NoticePageController extends BaseController{

	//回复条数
	public function notice()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// Auth::login(User::find(5));
		// $user = User::find(5);
		//没有查看的评论条数和回复条数
		$join_coms = ArticleJoinCom::where('receiver_id','=',$user->id)
						->where('status','=',0)
						->where('is_delete','=',0)
						->get();
		$com_count = count($join_coms);
		$replys = ArticleJoinReply::where('receiver_id','=',$user->id)
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
		// $user = User::find(5);
		// Auth::login();
		// dd($user);
		$per_page = Input::get('per_page');
		$page = Input::get('page');

		$join_coms = ArticleJoinCom::where('receiver_id','=',$user->id)
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
				$com->type = "comment";				
			}
		}
		$replys = ArticleJoinReply::where('receiver_id','=',$user->id)
						->where('status','=',0)
						->where('is_delete','=',0)
						->orderBy('created_at','desc')
						->get();
		if( count($replys) !=0 )
		{
			foreach( $replys as $reply)
			{
				$reply_sender = User::find($reply->sender_id);
				$reply->avatar = $reply_sender->avatar;
				$reply->username = $reply_sender->username;
				$reply->type = "reply";
			}
		}
		$notices = array_merge($join_coms->toArray(),$replys->toArray());
		//总页数
		$total = $per_page == ceil(count($notices)/$per_page);
			//排序
		$notices = StaticController::arraySortByCreatedAt($notices);
		//分页
		$notices = StaticController::page($per_page,$page,$notices);
		// dd(count($notices));
		return Response::json(array('errCode'=>0, 'message'=>'返回回复者头像和名字',
								'notices'=>$notices,
								'total'=> $total
							));	
	}

	//通知的简讯（官方类）
	public function  brefOffical()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(5);

		$per_page = Input::get('per_page');
		$page = Input::get('page');

		$officals = OfficalUser::where('user_id','=', $user->id)
								->where('is_delete','=', 0)
								->get();
		
		//总页数
		$total = ceil(count($officals)/$per_page);
		//排序
		$officals = StaticController::arraySortByCreatedAt($officals->toArray());
		//分页
		$officals = StaticController::page($per_page,$page,$officals);
		//总页数
		return Response::json(array('errCode'=>0, 'message'=>'返回官方简讯',
									'officals'=>$officals,
									'total'=> $total
									));
	}
}