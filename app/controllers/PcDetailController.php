<?php

class PcDetailController extends BaseController{

	//喜欢话题
	public function isArticleLike($article_id)
	{
		if(Sentry::check())
		{
			$is_like 	= DB::table('article_focus')->where('user_id','=', Sentry::getUser()->id)
							->where('article_id', '=', $article_id)->first();
		}
		//判断是否收藏
		if(isset($is_like))
		{
			$type = 1;
		}else{
			$type = 0;
		}
		return $type;
	}
	//喜欢参与话题
	public function isJoinLike($join_id)
	{
		if(Sentry::check())
		{
			$is_like 	= DB::table('join_focus')->where('user_id','=', Sentry::getUser()->id)
							->where('join_id', '=', $join_id)->first();
		}
		//判断是否收藏
		if(isset($is_like))
		{
			$type = 1;
		}else{
			$type = 0;
		}
		return $type;
	}

	//喜欢专题
	public function isTopicLike($topic_id)
	{
		if(Sentry::check())
		{
			$is_like 	= DB::table('topic_focus')->where('user_id','=', Sentry::getUser()->id)
							->where('topic_id', '=', $topic_id)->first();
		}
		//判断是否收藏
		if(isset($is_like))
		{
			$type = 1;
		}else{
			$type = 0;
		}
		return $type;
	}

	public function isGiftLike($gifts)
	{
		foreach( $gifts as $gift)
		{
			if( Sentry::check())
			{
				/* 2015-09-16 hyy 改 start */
				$gift_focus = GiftFocus::where( 'user_id', Sentry::getUser()->id )
									   ->where( 'gift_id', $gift->id )
									   ->first();
				if( isset( $gift_focus ) )
					$gift->type = 1;
				else
					$gift->type =0;
				/* 2015-09-16 hyy 改 end */
			}
		}
		return $gifts;
	}

	//专题详情页
	public function topicDetail()
	{
		$topic_id = Input::get('topic_id');
		$topic = Topic::find($topic_id);
		if(!isset($topic))
			return Response::view('errors.missing');
		
		$gifts = Gift::where('topic_id', '=', $topic->id)->get();
		if(isset($gifts))
		{	$number = 1;
			foreach($gifts as $gift)
			{
				$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
				// $gift->img = StaticController::imageWH($url);
				$gift->img = $url;
				$gift->number = $number++;
			}
		}
		$gifts = $this->isGiftLike($gifts);
		$type = $this->isTopicLike($topic_id);
		return View::make('pc.subject')->with(array(
				'topic' 		=> $topic,
				'gifts'			=> $gifts,
				'type'			=> $type 
			));
	}

	//话题详情页
	public function articleDetail()
	{
		//话题部分
		$article_id = Input::get('article_id');
		$article = Article::find($article_id);
		if(!isset($article))
			return Response::view('errors.missing');
		$article_parts = ArticlePart::where('article_id','=', $article_id)->orderBy('id','asc')->get();//获取话题内容
		$type = $this->isArticleLike($article_id);
		return View::make('pc.topic')->with(array(
						'article'		=>$article,
						'article_parts'	=>$article_parts,
						'type'			=>$type
					));
	}

	//话题页中参与话题信息
	public function brefJoin()
	{
		$paginator = ArticleJoin::select( 'id', 'user_id', 'created_at' )
					   ->where( 'article_id', Input::get('article_id') )
					   ->with(
					   		[
					   			'parts' => function( $query ){
					   				$query->orderBy( 'id', 'acs' );
					   			},
					   			'user' => function( $query ){
					   				$query->select( 'id', 'username', 'avatar' );
					   			}
					   		]
					   	)
					   ->paginate( (int)(Input::get('per_page')) );

		$article_joins = $paginator->getCollection();

		foreach ( $article_joins as $article_join ) {
			$user 	= $article_join->user;
			$parts 	= $article_join->parts;

			$article_join->username = $user->username;
			$article_join->avatar 	= $user->avatar;
			
			$text = '';
			$imgs = [];

			foreach ($parts as $part) {
				if ( $part->type == 'text' && empty( $text ) ){
					$text = $part->content;
				}
				else if ( $part->type == 'url' && count( $imgs ) < 4 ){
					array_push( $imgs, $part->content );
				}
			}
			$article_join->text = $text;
			$article_join->imgs = $imgs;
			unset( $article_join->user );
			unset( $article_join->parts );
		}

		return Response::json([
			'errCode'		=> 0, 
			'message'		=> '返回参与话题内容',
			'article_joins'	=> $article_joins,
			'total'			=> $paginator->getTotal()
		]);
	}

	//参与话题详情
	public function joinDetail()
	{	
		//参与话题内容
		$join_id = Input::get('join_id');
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::view('errors.missing');
		$article_join_parts = ArticleJoinPart::where('join_id','=',$join_id)->orderBy('id','asc')->get(); 
		$type = $this->isJoinLike($join_id);
		$user = User::find($article_join->user_id);
		$article_join->avatar = $user->avatar;
		$article_join->username = $user->username;
		$article_join->article_title = Article::find($article_join->article_id)->title;
		return View::make('pc.discuss')->with(array(
							'article_join' 			=> $article_join,
							'article_join_parts' 	=> $article_join_parts,
							'type' 					=> $type
						));
	}

	public function joinComs()
	{

		$paginator = ArticleJoinCom::select( 'id', 'content', 'sender_id', 'created_at' )
								   ->where( 'join_id', Input::get( 'join_id' ) )
								   // 预载入 指定预载入时的查询语句
								   ->with([
								   		'sender' => function( $query ){
								   			$query->select( 'id', 'username', 'avatar' );
								   		},
								   		'replies' => function( $query ){
								   			$query->select( 'com_id', 'content', 'sender_id' );
								   		},
								   		'replies.sender' => function( $query ){
								   			$query->select( 'id', 'username' );
								   		}
								   	])
								   ->orderBy( 'created_at', 'desc' )
								   ->paginate( (int)( Input::get('per_page') ) );

		$join_coms = $paginator->getCollection();

		foreach ( $join_coms as $comment ) {
			$user = $comment->sender;

			$comment->username 	= $user->username;
			$comment->avatar	= $user->avatar;
			
			foreach ( $comment->replies as $reply ){
				$reply->reply_name  = $reply->sender->username;
				unset( $reply->com_id );
				unset( $reply->sender );
			}
			unset( $comment->sender );
			// unset 用户信息
		}

		return Response::json([
			'errCode'	=> 0, 
			'message'	=> '返回参与话题详情',
			'join_coms' => $join_coms,
			'total'		=> $paginator->getTotal()
		]);
/*
		$join_id = Input::get('join_id');
		//评论内容
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$join_coms = DB::table('article_join_coms')->where('join_id', '=', $join_id)->orderBy('created_at','desc')->get();
		//总页数
		$total = ceil(count($join_coms) / $per_page);
		//文章
		$join_coms = StaticController::page($per_page,$page,$join_coms);
		if( $join_coms )
		{
			foreach($join_coms as $join_com)
			{	
				$join_com->username = User::find($join_com->sender_id)->username;
				$join_com->avatar = User::find($join_com->sender_id)->avatar;
				$join_com->replys = ArticleJoinReply::where('com_id', '=', $join_com->id)->orderBy('id','asc')->get();
				if(count($join_com->replys)!=0)
				{
					foreach($join_com->replys as $reply)
					{
						$reply->reply_name = User::find($reply->sender_id)->username;
					}
				}
			}
		}

		return Response::json(array('errCode'=>0, 'message'=>'返回参与话题详情',
							'join_coms' => $join_coms,
							'total'		=> $total
						));
*/
	}
}