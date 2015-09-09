<?php

class ArticlePageController extends BaseController{
	//热门话题
	public function hotArticle()
	{
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$articles = DB::table('articles')->orderBy('focus_num', 'desc')->get();
		//总页数
		$total = ceil(count($articles)/$per_page);
		//文章
		$articles = StaticController::page($per_page, $page, $articles);
		
		if( $articles )
		{	foreach( $articles as $article)
			{
				$article_url = ArticlePart::where('article_id', '=', $article->id)
							->where('type','=', 'url')->first();
				if(isset($article_url))
				{
					$article->img = StaticController::imageWH($article_url->content);
				}

				$article_text = ArticlePart::where('article_id', '=', $article->id)
							->where('type','=', 'text')->first();
				if(isset($article_text))	
				{
					$article->text = $article_text->content;
				}				
			}
			return Response::json(array('errCode'=>0, 'message'=>'返回热门话题','articles'=>$articles,'total'=>$total));
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回热门话题','articles'=>$articles,'total'=>$total));
	}

	//官方话题
	public function officalArticle()
	{	
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$articles = DB::table('articles')->orderBy('updated_at', 'desc')->get();
		//总页数
		$total = ceil(count($articles)/$per_page);
		//文章
		$articles = StaticController::page($per_page, $page, $articles);
		
		if( $articles )
		{	foreach( $articles as $article)
			{
				$article_url = ArticlePart::where('article_id', '=', $article->id)
							->where('type','=', 'url')->first();
				if(isset($article_url))
				{
					$article->img = StaticController::imageWH($article_url->content);;
				}

				$article_text = ArticlePart::where('article_id', '=', $article->id)
							->where('type','=', 'text')->first();
				if(isset($article_text))
				{
					$article->text = $article_text->content;
				}				
			}
			return Response::json(array('errCode'=>0, 'message'=>'返回热门话题','articles'=>$articles,'total'=>$total));
		}

		return Response::json(array('errCode'=>0, 'message'=>'返回热门话题','articles'=>$articles,'total'=>$total));
	}

	//话题详情
	public function detail()
	{
		//话题部分
		$article_id = Input::get('article_id');
		$article = Article::find($article_id);
		if(!isset($article))
			return Response::json(array('errCode'=>1, 'message'=>'没有该话题！'));
		$article_parts = ArticlePart::where('article_id','=', $article_id)->orderBy('id','asc')->get();//获取话题内容
		foreach($article_parts as $part)
		{
			if($part->type == 'url')
			{
				$part->img = StaticController::imageWH($part->content);
			}
		}
		//参与话题部分
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$article_joins = DB::table('article_joins')->where('article_id', '=', $article_id)->get();
		//总页数
		$total = ceil(count($article_joins)/$per_page);
		//评论
		$article_joins = StaticController::page($per_page,$page,$article_joins);
		// dd(count($article_joins));
		if( $article_joins )
		{
			foreach($article_joins as $article_join)
			{
				$user_id = $article_join->user_id;
				$user = User::find($user_id);//参与话题人
				$article_join->username = $user->username;//参与话题人昵称
				$article_join->avatar = 	$user->avatar;//头像
				$article_part = ArticleJoinPart::where('join_id', '=', $article_join->id)->where('type','=','text')->first();
				// Log::info($article_part);
				// echo $article_part->content;
				$article_join->content = $article_part->content;//第一段内容
			}
		return Response::json(array('errCode'=>0, 'message'=>'返回文章详细内容',
						'article'		=>$article,
						'article_parts'	=>$article_parts,
						'article_joins' 	=>$article_joins,
						'total'=>$total
					));
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回文章详细内容',
						'article'		=>$article,
						'article_parts'	=>$article_parts,
						'total'=>$total
					));
	}

	//参与话题详情
	public function involve()
	{
		//参与话题内容
		$join_id = Input::get('join_id');
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::json(array('errCode'=>1, 'message'=>'没有该参与话题内容！'));
		$article_join_parts = ArticleJoinPart::where('join_id','=',$join_id)->orderBy('id','asc')->get(); 
		foreach($article_join_parts as $part)
		{
			if($part->type == 'url')
			{
				$part->content = StaticController::imageWH($part->content);
			}
		}		
		//评论内容
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$join_coms = DB::table('article_join_coms')->where('join_id', '=', $join_id)->get();
		//总页数
		$total = ceil(count($join_coms)/$per_page);
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
		if($page == 1)
		{
			return Response::json(array('errCode'=>0, 'message'=>'返回参与话题详情',
							'article_join' => $article_join,
							'article_join_parts' => $article_join_parts,
							'join_coms' => $join_coms,
							'total'=>$total
						));
		}else{
			return Response::json(array('errCode'=>0, 'message'=>'返回参与话题详情',
							'join_coms' => $join_coms,
							'total'=>$total
						));
		}
		
	}

	// //参与话题详情的评论
	// public function involveComments()
	// {
	// 	$per_page = Input::get('per_page');
	// 	$page = Input::get('page');
	// 	$articles = DB::table('')->orderBy('updated_at', 'desc');
	// 	//总页数
	// 	$total = ceil(count($articles)/$per_page);
	// 	//文章
	// 	$articles = StaitcController::page($per_page, $page, $articles);
	// }

}

