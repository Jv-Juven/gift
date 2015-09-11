<?php

class HomePageController extends BaseController {

	//首页呈现
	public function showWelcome()
	{
		$posters 	= Poster::where('daily_id','=',0)->get();
		$topics		= Topic::where('topic_url', '!=','')->orderBy('created_at','desc')->get();
		$daily 		= poster::where('daily_id','=', 1)->get();
		foreach( $daily as $recommend )
		{
			$gift = Gift::find($recommend->info_url);
			$recommend->content = $gift->content;
			$recommend->scan_num = $gift->scan_num;
			$recommend->focus_num = $gift->focus_num;	
		}
		foreach($posters as $poster)
		{
			$poster->photo_url = StaticController::imageWH($poster->photo_url);
		}
		foreach($topics as $topic)
		{
			$topic->topic_url = StaticController::imageWH($topic->topic_url);
		}
		foreach($daily as $day)
		{
			$day->photo_url = StaticController::imageWH($day->photo_url);
 		}

		if( Request::wantsJson() )
		{
			return Response::json(array('errCode'=>0, 'message'=>'返回首页首页数据',
								'posters' 			=> $posters,
								'topics'			=> $topics,
								'recommendations'	=> $daily
							));	
		}
		return View::make('index.home')->with(array(
				'posters' 			=> $posters,
				'topics'			=> $topics,
				'recommendations'	=> $daily
			));
	}

	//礼品详情页
	public function giftDetail()
	{
		$gift_id 	= Input::get('gift_id');
		
		if(Request::wantsJson())
		{
			if(!isset($gift_id))
				return Response::json(array('errCode'=>1,'message'=>'你查看的商品没有！'));
		}else{
			if(!isset($gift_id))
				return Response::view('errors.missing');
		}
		
		$gift 		= Gift::find($gift_id);
		$gift_posters = GiftPoster::where('gift_id', '=',$gift_id)->get();
		//做成数组传给移动端
		if( count($gift_posters) !=0 )
		{	$gift_poster_array = array();
			foreach($gift_posters as $poster)
			{
				array_push($gift_poster_array, StaticController::imageWH($poster->url));
			}
		}

		//收藏的人
		$focus_users	= Gift::find($gift_id)->users()->get();
		//相似推荐
		$gifts 		= DB::table('gifts')->where('scene_id','=',$gift->scene_id)
						     ->where('object_id', '=', $gift->object_id)
						     ->where('char_id','=', $gift->char_id)
						     ->get();
		$gifts_like = array();
		foreach($gifts as $gift)
		{	
			$gift_poster = GiftPoster::where('gift_id', '=', $gift->id)->first();
			array_push($gifts_like, $gift_poster);
		}
		// dd(count($gifts_like) > 9);
		if(count($gifts_like) > 30)
		{
			$gifts_like = array_slice($gifts_like,0,30);
		}
		$gift_photo_intros = GiftPhotoIntro::where('gift_id','=', $gift_id)->get();
		// dd($gift->taobao_url); 变量名不要一样的,后面的会覆盖前面的
		//做成数组传给移动端
		if( count($gift_photo_intros) !=0 )
		{
			$gift_intro_array = array();
			foreach($gift_photo_intros as $intro)
			{		
					$url = StaticController::imageWH($intro->url);
					array_push($gift_intro_array, $url);
			}
		}

		$gift 		= Gift::find($gift_id);

		if(Sentry::check())
		{
			$gift_focus 	= DB::table('gift_focus')->where('user_id','=', Sentry::getUser()->id)
							->where('gift_id', '=', $gift_id)->first();
		}
		//判断是否收藏
		if(isset($gift_focus))
		{
			$type = 1;
		}else{
			$type = 0;
		}

		if( Request::wantsJson() )
		{
			return Response::json(array('errCode'=>0,'message'=>'返回数据',
							'gift' 				=> $gift,
							'gift_posters' 		=> $gift_poster_array,
							'focus_users' 		=> $focus_users,
							'gifts_like'		=> $gifts_like,
							'gift_photo_intros' => $gift_intro_array,
							'type'				=> $type
					));
		}
		return View::make('index/goodDetails')->with(array(
				'gift' 				=> $gift,
				'gift_posters' 		=> $gift_posters,
				'focus_users' 		=> $focus_users,
				'gifts_like'		=> $gifts_like,
				'gift_photo_intros' => $gift_photo_intros,
				'type'				=> $type

			));
	}

	//收藏详情页
	public function like()
	{
		$gift_id 	= Input::get('gift_id');
		$gift 		= Gift::where('id', '=', 'gift_id')->first();
		//收藏的人
		$focus_users	= Gift::find($gift_id)->users();
		//相似推荐
		$gifts 		= DB::table('gifts')->where('scene_id','=',$gift->scene_id)
						     ->where('object_id', '=', $gift->object_id)
						     ->where('char_id','=', $gift->char_id)
						     ->get();
		$gifts_like = array();
		foreach($gifts as $gift)
		{	
			$gift_poster = GiftPoster::where('gift_id', '=', $gift->id)->first();
			array_push($gifts_like, $gift_poster);
		}
		if( Request::wantsJson() )
		{
			return Response::json(array('errCode'=>0,'message'=>'返回收藏详情页数据',
				'focus_users' 	=> $focus_users,
				'gifts_like'	=> $gifts_like 		
			));
		}
		return View::make('index/like')->with(array(
				'focus_users' 	=> $focus_users,
				'gifts_like'	=> $gifts_like 		
			));
	}

	//专题页
	public function topic()
	{
		$topic_id = Input::get('topic_id');
		$topic = Topic::find($topic_id);
		if(!isset($topic))
		{
			if( Request::wantsJson() )
			{
				return Response::json(array('errCode'=>1,'message'=>该专题不存在));
			}else{
				return Response::view('errors.missing');
			}
		}
		$gifts = Gift::where('topic_id', '=', $topic->id)->get();
		if(isset($gifts))
		{	$number = 1;
			foreach($gifts as $gift)
			{
				$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
				$gift->img = StaticController::imageWH($url);
				$gift->number = $number++;
			}
		}

		if( Request::wantsJson() )
		{
			return Response::json(array('errCode'=>0,'message'=>'返回专题页数据',
				'topic' 	=> $topic,
				'gifts'	=> $gifts		
			));
		}
		return View::make('index/goodsList')->with(array(
				'topic' 	=> $topic,
				'gifts'	=> $gifts
			));	
 	}

}
