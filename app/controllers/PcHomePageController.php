<?php

class PcHomePageController extends BaseController{

	public function login()
	{
		return View::make('pc.login');
	}
	//首页静态页面
	public function home()
	{
		$scroll_imgs = ScrollImg::all();
		//话题
		$topics		= Topic::where('topic_url', '!=','')->orderBy('created_at','desc')->get();
		$topics 	= StaticController::page(12, 1, $topics);
		
		//每日推荐
		$daily 	= Poster::where('daily_id','=', 1)->get();
		//每日推
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
		$articles = StaticController::page(12, 1, $articles);
		
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
		return View::make('pc.home')->with(array(
									'topics'		=> $topics, 
									'gifts'			=> $daily,
									'articles'		=> $articles,
									'scroll_imgs'	=> $scroll_imgs
									));
	}
}