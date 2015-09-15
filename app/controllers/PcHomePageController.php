<?php

class PcHomePageController extends BaseController{

	//首页静态页面
	public function home()
	{
		//话题
		$topics		= Topic::where('topic_url', '!=','')->orderBy('created_at','desc')->get();
		$topics 	= StaticController::page(12, 1, $topics);
		
		//每日推荐
		$daily 	= poster::where('daily_id','=', 1)->get();
		//每日推荐
		$daily 	= StaticController::page(16, 1, $daily);
		if(Sentry::check())
		{
			foreach( $daily as $recommend)
			{
				$gift = Gift::find($recommend->info_url);
				$recommend->title = $gift->title;
				$recommend->price = $gift->price;
				$recommend->taobao_url = $gift->taobao_url;
				$gift_focus = GiftFocus::where('gift_id','=',$recommend->info_url)
										->where('user_id','=', Sentry::getUser()->id)
										->first();
				if(isset($gift_focus))
					$recommend->focus = 1;
				$recommend->focus =0; 
			}
		}
		foreach( $daily as $recommend)
		{
				$gift = Gift::find($recommend->info_url);
				$recommend->title = $gift->title;
				$recommend->price = $gift->price;
				$recommend->taobao_url = $gift->taobao_url;
				$recommend->focus =0; 
		}
		//精选话题
		$articles = DB::table('articles')->orderBy('focus_num', 'desc')->get();
		$articles = StaticController::page(4, 1, $articles);
		
		if( $articles )
		{	
			foreach( $articles as $article)
			{
				$article_url = ArticlePart::where('article_id', '=', $article->id)
							->where('type','=', 'url')->first();
				// dd($article_url->content);		
				if(isset($article))
				{
					$article->url = $article_url->content;			
				}else{
					$article->url = null;	
				}
			}
		}
		return View::make('pc.home')->with(array('topics'=>$topics, 'gifts'=>$daily,'articles'=>$articles));
	}
	

	// //专题精选
	// public function topics()
	// {
	// 	$per_page 	= Input::get('per_page');
	// 	$page 		= Input::get('page');
	// 	$topics		= Topic::where('topic_url', '!=','')->orderBy('created_at','desc')->get();
	// 	//总页数
	// 	$total = ceil(count($topics)/$per_page);
	// 	$topic 		= StaticController::page($per_page, $page, $topics);
	// 	return View::make('pc.home')->with(array('topics'=>$topics,'total'=>$total));
	// }

	// //甑选推荐
	// public function recommend()
	// {
	// 	$per_page = Input::get('per_page');
	// 	$page = Input::get('page');
	// 	//photo_url 礼物链接
	// 	//info_url 礼物id
	// 	$daily 	= poster::where('daily_id','=', 1)->get();
	// 	//总页数
	// 	// $total = ceil(count($daily)/$per_page);
	// 	if(Sentry::check())
	// 	{
	// 		foreach( $daily as $recommend)
	// 		{
	// 			$gift = Gift::find($recommend->info_url);
	// 			$recommend->title = $gift->title;
	// 			$recommend->price = $gift->price;
	// 			$gift_focus = GiftFocus::where('gift_id','=',$recommend->info_url)
	// 									->where('user_id','=', Sentry::getUser()->id)
	// 									->first();
	// 			if(isset($gift_focus))
	// 				$recommend->focus = 1;
	// 			$recommend->focus =0; 
	// 		}
	// 	}
	// 	foreach( $daily as $recommend)
	// 	{
	// 			$gift = Gift::find($recommend->info_url);
	// 			$recommend->title = $gift->title;
	// 			$recommend->price = $gift->price;
	// 			$recommend->focus =0; 
	// 	}
	// 	$gifts 	= StaticController::page($per_page, $page, $daily);

	// 	return View::make('pc.home')->with(array('gifts'=>$gifts,'total'=>$total));
	// }

	// //热门话题
	// public function article()
	// {
	// 	$per_page = Input::get('per_page');
	// 	$page = Input::get('page');

	// 	$articles = DB::table('articles')->orderBy('focus_num', 'desc')->get();
	// 	//总页数
	// 	// $total = ceil(count($articles)/$per_page);
	// 	//文章
	// 	$articles = StaticController::page($per_page, $page, $articles);
		
	// 	if( $articles )
	// 	{	
	// 		foreach( $articles as $article)
	// 		{
	// 			$article_url = ArticlePart::where('article_id', '=', $article->id)
	// 						->where('type','=', 'url')->first();
	// 			$article->url = $article_url->content;			
	// 		}
	// 		return View::make('pc.home')->with(array('articles'=>$articles,'total'=>$total));
	// 	}
	// 	return View::make('pc.home')->with(array('total'=>$total));
	// }
}