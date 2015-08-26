<?php

class ArticleController extends BaseController{
	//热门话题
	public function hotArticle()
	{
		$articles = Article::orderBy('focus_num', 'desc')->get();
		foreach( $articles as $article)
		{
			$article_url = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'url')->first();
			if(isset($article_url))
			{
				$article->url = $article_url->content;
			}

			$article_text = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'text')->first();
			if(isset($article_text))
			{
				$article->text = $article_text->content;
			}				
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回热门话题','articles'=>$articles));
	}

	public function officalArticle()
	{
		$articles = Article::orderBy('updated_at', 'desc')->get();
		foreach( $articles as $article)
		{
			$article_url = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'url')->first();
			if(isset($article_url))
			{
				$article->url = $article_url->content;
			}

			$article_text = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'text')->first();
			if(isset($article_text))
			{
				$article->text = $article_text->content;
			}				
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回热门话题','articles'=>$articles));
	}

	//话题详情
	public function detail()
	{
		$article_id = Input::get('article_id');
		$article = Article::find($article_id);
		if(!isset($article))
			return Response::json(array('errCode'=>1, 'message'=>'没有该话题！'));
		$article_parts = ArticlePart::where('article_id','=', $article_id)->orderBy('id','asc')->get();//获取话题内容
		$article_joins = ArticleJoin::where('article_id', '=', $article_id)->get();//参与话题的内容
		if(count($article_joins) != 0)
		{
			foreach($article_joins as $article_join)
			{
				$user_id = $article_join->user_id;
				$user = User::find($user_id);//参与话题人
				$article_join->username = $user->username;//参与话题人昵称
				$article_join->avatar = 	$user->avatar;//头像
				$article_part = ArticleJoinPart::where('join_id', '=', $article_join->id)->where('type','=','text')->first();
				$article_join->content = $article_part->content;//第一段内容
			}
		return Response::json(array('errCode'=>0, 'message'=>'返回文章详细内容',
						'article'		=>$article,
						'article_parts'	=>$article_parts,
						'article_joins' 	=>$article_joins
					));
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回文章详细内容',
						'article'		=>$article,
						'article_parts'	=>$article_parts,
					));
	}

	//参与话题详情
	public function involve()
	{
		$join_id = Input::get('join_id');
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::json(array('errCode'=>1, 'message'=>'没有该参与话题内容！'));
		$article_join_parts = ArticleJoinPart::where('join_id','=',$join_id)->orderBy('id','asc')->get(); 
		$join_coms = ArticleJoinCom::where('join_id', '=', $join_id)->get();
		if(count($join_coms)!=0)
		{
			foreach($join_coms as $join_com)
			{	
				$join_com->username = User::find($join_com->user_id)->username;
				$join_com->avatar = User::find($join_com->user_id)->avatar;
				$join_com['replys'] = ArticleJoinReply::where('com_id', '=', $join_com->id)->orderBy('id','asc')->get();
				if(count($join_com['replys'])!=0)
				{
					foreach($join_com['replys'] as $reply)
					{
						$reply->reply_name = User::find($reply->username);
					}
				}
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回参与话题详情',
							'article_join' => $article_join,
							'article_join_parts' => $article_join_parts,
							'join_coms' => $join_coms
						));
	}

}

