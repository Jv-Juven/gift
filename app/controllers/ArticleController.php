<?php
class ArticleController extends BaseController{

	//评论——<<<<<事务>>>>>
	public function comment()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();
		$join_id = Input::get('join_id');
		$content = Input::get('content');
		if(empty($content))
			return Response::json(array('errCode'=>2, 'message'=>'[content没有内容]请填写评论论文！'));
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::json(array('errCode'=>3, 'message'=>'[join_id对应的文章不存在]你评论的话题不存在！'));
		try
		{
			$comment = DB::transaction(function() use( $article_join,$join_id,$content,$user ) {
				//新增评论
				$article_join->com_num = $article_join->com_num+1;
				$article_join->save();

				$comment = new ArticleJoinCom;
				$comment->sender_id = $user->id;
				$comment->receiver_id = $article_join->user_id; 
				$comment->join_id = $join_id;
				$comment->content = $content;
				$comment->save();
				return $comment;
			});
		}catch(\Exception $e)
		{
			return Response::json(array('errCode'=>11,'message'=>'操作失败' ));
		}
		return Response::Json(array('errCode'=>0, 'message'=>'评论成功！','created_at'=>$comment->created_at));
	}

	//参与话题回复
	public function reply()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $receiver_id = Input::get('receiver_id');
		$com_id = Input::get('com_id');
		$content = Input::get('content');
		// $receiver = User::find($receiver_id);
		
		// if(!isset($receiver))
		// 	return Response::json(array('errCode'=>2, 'message'=>'[数据库中没有receiver_id对应的user]被评论者不存在'));
		
		if(empty($content))
			return Response::json(array('errCode'=>3, 'message'=>'[content没有内容]请填写评论论文！'));
		
		$join_com = ArticleJoinCom::find($com_id);
		if(!isset($join_com))
			return Response::json(array('errCode'=>4, 'message'=>'[com_id对应的评论不存在]你回复的评论不存在！'));
		//新增回复
		$reply = New ArticleJoinReply;
		$reply->receiver_id 	= $join_com->sender_id;
		$reply->sender_id 	= $user->id;
		$reply->com_id 	= $com_id;
		$reply->content 	= $content;
		if(!$reply->save())
			return Response::json(array('errCode'=>5, 'message'=>'[数据库问题]回复失败！'));
		
		return Response::Json(array('errCode'=>0, 'message'=>'回复成功！'));
	}

	//删除评论——事务
	public function dcomment()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$com_id =  Input::get('com_id');
		$comment = ArticleJoinCom::find($com_id);
		if(!isset($comment))
			return Response::Json(array('errCode'=>2, 'message'=>'[com_id对应的评论不存在]此评论不存在！'));
		if($comment->sender_id != $user->id)
			return Response::Json(array('errCode'=>3, 'message'=>'[权限不够]不可删除别人的评论！'));
		try
		{
			DB::transaction(function() use( $comment ) {
				//参与话题评论减1
				$article_join = ArticleJoin::find($comment->join_id);
				$article_join->com_num = $article_join->com_num-1;
				$article_join->save();
				//删除评论
				$comment->delete();
			});
		}catch(\Exception $e)
		{
			return Response::json(array('errCode'=>11,'message'=>'操作失败'));
		}
		
		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}	

	//删除回复
	public function dreply()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();	
		$reply_id =  Input::get('reply_id');
		$reply = ArticleJoinCom::find($reply_id);
		if(!isset($reply))
			return Response::Json(array('errCode'=>2, 'message'=>'[reply_id对应的回复不存在]此回复不存在！'));
		if($reply->sender_id != $user->id)
			return Response::Json(array('errCode'=>3, 'message'=>'[权限不够]不可删除别人的回复！'));
		if(!$reply->delete())
			return Response::json(array('errCode'=>4, 'message'=>'[数据库错误]删除失败'));
		
		return Response::json(array('errCode'=>0, 'message'=>'删除成功'));
	}
	
	//参与话题——事务
	public function issue()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$data = json_decode(Input::get('data'));
		// Log::info(Input::get('data'));
		$article_id = $data->article_id;	
		// Log::info($article_id);
		$article = Article::find($article_id);
		if(!isset($article))
			return Response::json(array('errCode'=>2,'message'=>'你想参与的话题不存在！'));

		$contents = $data->content;
		if(!is_array($contents) || !count($contents))
			return Response::json(array('errCode'=>3,'message'=>'内容不能为空！'));
		try
		{	
			DB::transaction(function() use( $user,$article,$article_id,$contents ){
				//修改参与话题条数
				$article->join_num = $article->join_num+1;
				$article->save();

				$article_join = New ArticleJoin;
				$article_join->article_id = $article_id;
				// $article_join->user_id = 1;
				$article_join->user_id = $user->id;
				$article_join->save();

				foreach($contents as $content)
				{
					$article_join_part = New ArticleJoinPart;
					$article_join_part->join_id = $article_join->id;
					if(isset($content->text))
						$key = "text";
					else
						$key = "url";
					$article_join_part->type = $key;
					// Log::info($article_join_part->type);
					$article_join_part->content = $content->$key;
					// Log::info($article_join_part->content);
					$article_join_part->save();
				}
			});
		}catch(\Exception $e)
		{
			return Response::json(array('errCode'=>11,'message'=>'操作失败'));
		}
		return Response::json(array('errCode'=>0, 'message'=>'保存成功！'));
	}

	 //编辑掺产于话题
	public function edit()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $join_id = Input::get('join_id');	
		$data = json_decode(Input::get('data'));
		$join_id = $data->join_id;
		$article_join = ArticleJoin::find($join_id);

		if(!isset($article_join))
			return Response::json(array('errCode'=>2,'message'=>'你想参与的话题不存在！'));
		// $content=array('text'=>'测试数据');
		// $content = Input::get('content');
		$contents = $data->content;
		if(!is_array($contents) || !count($contents))
			return Response::json(array('errCode'=>3,'message'=>'内容不能为空！'));
		
		if($user->id != $article_join->user_id)
			return Response::json(array('errCode'=>4,'message'=>' [权限不够]不可编辑他人的参与话题！'));
		//返回删除条数
		$article_join_parts = ArticleJoinPart::where('join_id', '=', $join_id)->delete();
		if($article_join_parts == 0)
			return Response::json(array('errCode'=>5, 'message'=>'[数据库错误]参与话题编辑失败！'));

		foreach($contents as $content)
		{
			$article_join_part = New ArticleJoinPart;
			$article_join_part->join_id = $article_join->id;
			if(isset($content->text))
				$key = "text";
			else
				$key = "url";
			$article_join_part->type = $key;
			$article_join_part->content = $content->$key;
			if(!$article_join_part->save())
				return Response::json(array('errCode'=>6,'message'=>'编辑话题保存不完整，请重新编辑！'));
		}
		
		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	//删除参与话题《《事务》》
	public function dArticle()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>10, 'message'=>'请登录'));
		$user = Sentry::getUser();
		$join_id = Input::get('join_id');	
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::json(array('errCode'=>2,'message'=>'你想删除的参与话题不存在！'));

		if($user->id != $article_join->user_id)
			return Response::json(array('errCode'=>3,'message'=>' [权限不够]不可删除他人的参与话题！'));

		try
		{	
			DB::transaction(function() use( $article_join ){
				//删除参与话题条数
				$article = Article::find($article_join->article_id);
				$article->join_num = $article->join_num-1;
				$article->save();
				$article_join->delete();
			});
		}catch(\Exception $e)
		{
			return Response::json(array('errCode'=>11,'message'=>'操作失败'));
		}
		return Response::json(array('errCode'=>0, 'message'=>'参与话题删除成功！'));
	}

	//收藏话题——事务
	public function articleCollection()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>10, 'message' => '请登录'));
		// Sentry::login(Sentry::findUserById(5), false);
		$article_id 	= Input::get('article_id');
		$article_focus 	= ArticleFocus::where('user_id','=', Sentry::getUser()->id)
							->where('article_id', '=', $article_id)->first();
		

		if(count($article_focus) == 1)
		{	
			try
			{	
				DB::transaction(function() use( $article_id,$article_focus ){
					//添加收藏话题条数
					$article = Article::find($article_id);
					$article->focus_num = $article->focus_num+1;
					$article->save();

					$article_focus 	= DB::table('article_focus')->where('user_id','=', Sentry::getUser()->id)
									->where('article_id', '=', $article_id);
					$article_focus->delete();
				});
			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败'));
			}
			return Response::json(array('errCode'=>0, 'message'=>'取消收藏成功！'));
		
		}else{
		
			try
			{
				DB::transaction(function() use( $article_id ) {
					//添加收藏话题条数
					$article = Article::find($article_id);
					$article->focus_num = $article->focus_num-1;
					$article->save();

					$article_focus = New ArticleFocus;
					$article_focus->user_id = Sentry::getUser()->id;
					$article_focus->article_id = $article_id;
					$article_focus->save();
				});
			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败'));
			}
			return Response::json(array('errCode'=>0, 'message'=>'收藏成功！'));
		}
	}

	//收藏参与话题——事务
	public function joinCollection()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>10, 'message' => '请登录'));
		// Sentry::login(Sentry::findUserById(5), false);
		$join_id 	= Input::get('join_id');
		$join_focus 	= DB::table('join_focus')->where('user_id','=', Sentry::getUser()->id)
							->where('join_id', '=', $join_id)->first();

		if(count($join_focus) == 1)
		{
			try
			{

				DB::transaction(function() use( $join_id,$join_focus ) {
					//参与话题收藏条数减1
					$article_join = ArticleJoin::find($join_id);
					$article_join->focus_num = $article_join->focus_num-1;
					$article_join->save();

					$join_focus 	= DB::table('join_focus')->where('user_id','=', Sentry::getUser()->id)
									->where('join_id', '=', $join_id);
					$join_focus->delete();
				});
			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败'));
			}
			return Response::json(array('errCode'=>0, 'message'=>'取消收藏成功！'));
		
		}else{
		
			try
			{
				DB::transaction(function() use( $join_id ) {
					//参与话题收藏条数加1
					$article_join = ArticleJoin::find($join_id);
					$article_join->focus_num = $article_join->focus_num+1;
					$article_join->save();

					$join_focus = New JoinFocus;
					$join_focus->user_id = Sentry::getUser()->id;
					$join_focus->join_id = $join_id;
					$join_focus->save();
				});
			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败'));
			}
			return Response::json(array('errCode'=>0, 'message'=>'收藏成功！'));
		}
	}
}