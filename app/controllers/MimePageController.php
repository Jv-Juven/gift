<?php

class MimePageController extends BaseController{

	//我参与的话题
	public function joinArticle()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(1);
		$article_joins = ArticleJoin::where('user_id', '=', $user->id)->get();
		if(count($article_joins) == 0)
			return Response::json(array('errCode'=>0,'message'=>'该用户没有参与话题！'));
		//根据用户参与的话题取到官方话题
		$articles = array();
		foreach($article_joins as $article_join)
		{
			$article = Article::where('id', '=', $article_join->article_id)->first();
			array_push($articles, $article);
		}
		//去掉重复值
		array_unique($articles);
		//取到每个话题的图片和首段文字
		foreach( $articles as $article)
		{
			$article_url = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'url')
						->orderBy('id','asc')
						->first();
			if(isset($article_url))
			{
				$article->url = $article_url->content;
			}

			$article_text = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'text')
						->orderBy('id','asc')
						->first();
			if(isset($article_text))
			{
				$article->text = $article_text->content;
			}				
		}

		return Response::json(array('errCode'=>0, 'message'=>'返回参与话题的内容！',
						 'articles'=>$articles,
						 'user' => $user
						 ));
	}

	//我喜欢的礼品
	public function likeGift()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(1);
		//获取我喜欢的礼品——动态属性
		$focus = $user->focus;
		if(count($focus) != 0)
		{
			foreach($focus as $gift)
			{	
				$gift->url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			}
		}

		return Response::json(array('errCode'=>0, 'message'=>'返回用户喜欢的礼品',
						'gifts'=>$focus,
						 'user' => $user
						));
	}
} 