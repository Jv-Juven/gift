<?php

class MimePageController extends BaseController{

	//我参与的话题
	public function joinArticle()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(1);
		
		//分页
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$article_joins = DB::table('article_joins')->orderBy('created_at', 'desc')->get();
		//总页数
		$total = ceil(count($article_joins)/$per_page);
		//参与话题
		$article_joins = StaticController::page($per_page, $page, $article_joins);
		if($article_joins == false )
			return Response::json(array('errCode'=>0,'message'=>'该用户已没有参与话题！'));
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
				$article->content = $article_text->content;
			}				
		}

			return Response::json(array('errCode'=>0, 'message'=>'返回参与话题的内容！',
							 'articles'=>$articles,
							 'total'=>$total
							 ));
	}

	//我喜欢的礼品
	public function likeGift()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		 // $user = User::find(1);
		//获取我喜欢的礼品——动态属性
		//分页
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$gift_focus = DB::table('gift_focus')->where('user_id','=', $user->id)
											->orderBy('created_at', 'desc')
											->get();
		//总页数
		$total = ceil(count($gift_focus)/$per_page);
		// dd($total);
		//喜欢的礼品
		$focus = StaticController::page($per_page, $page, $gift_focus);
		// dd(count($focus));
		$gifts = array();
		if( $focus )
		{
			foreach($focus as $gift)
			{	
				array_push($gifts, Gift::find($gift->gift_id));
			}

			foreach($gifts as $candy)
			{
				$url = GiftPoster::where('gift_id','=',$candy->id)->first()->url;
				$candy->url = StaticController::imageWH($url);
			}
		}
	
		return Response::json(array('errCode'=>0, 'message'=>'返回用户喜欢的礼品',
							'gifts'=>$gifts,
							'total'=>$total,
							));
	}

	//H5页面接口
	public function likeGiftH()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		 // $user = User::find(1);

		return View::make('index.userCenter')->with(array('user' =>$user));
	}

	//H5 ajax
	public function giftAjax()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(1);

		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$gift_focus = DB::table('gift_focus')->where('user_id','=', $user->id)
											->orderBy('created_at', 'desc')
											->get();
		//总页数
		$total = ceil(count($gift_focus)/$per_page);
		// dd($total);
		//喜欢的礼品
		$focus = StaticController::page($per_page, $page, $gift_focus);
		// dd(count($focus));
		$gifts = array();
		if( $focus )
		{
			foreach($focus as $gift)
			{	
				array_push($gifts, Gift::find($gift->gift_id));
			}

			foreach($gifts as $candy)
			{
				$url = GiftPoster::where('gift_id','=',$candy->id)->first()->url;
				$candy->url = StaticController::imageWH($url);
			}
		}
	
		return Response::json(array('errCode'=>0, 'message'=>'返回用户喜欢的礼品',
							'gifts'=>$gifts,
							'total'=>$total,
							));
	}
} 
