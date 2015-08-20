<?php

class HomePageController extends BaseController {

	//首页呈现
	public function showWelcome()
	{
		$posters 	= Poster::all();
		$topics		= Topic::all();

		return View::make('index.home')->with(array(
				'posters' 	=> $posters,
				'topics	'	=> $topics,
			));
	}

	//礼品详情页
	public function giftDetail()
	{
		$gift_id 	= Input::get('gift_id');
		if(!isset($gift_id))
			return Response::view('errors.missing');
		$gift 		= Gift::find($gift_id)->first();
		$gift_posters = GiftPoster::where('gift_id', '=',$gift_id)->get();
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
		return View::make('index/goodsDetails')->with(array(
				'gift' 		=> $gift,
				'gift_posters' 	=> $gift_posters,
				'focus_users' 	=> $focus_users,
				'gifts_like'	=> $gifts_like
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
		return View::make('index/like')->with(array(
				'focus_users' 	=> $focus_users,
				'gifts_like'	=> $gifts_like 		
			));
	}

	//专题页
	public function topic()
	{
		// $topic_id = Input::get('topic_id');
		$topic_id = 1;
		$topic = Topic::find($topic_id);
		if(!isset($topic))
			return Response::view('errors.missing');
		$gifts = Gift::where('topic_id', '=', $topic->id)->get();
		if(isset($gifts))
		{	$number = 1;
			foreach($gifts as $gift)
			{
				$gift->img = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
				$gift->number = $number++;
			}
		}
		return View::make('index/goodsList')->with(array(
				'topic' 	=> $topic,
				'gifts'	=> $gifts
			));	
 	}

}
