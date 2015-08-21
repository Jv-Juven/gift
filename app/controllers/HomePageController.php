<?php

class HomePageController extends BaseController {

	//首页呈现
	public function showWelcome()
	{
		$posters 	= Poster::all();
		$topics		= Topic::all();
		// dd($topics[0]);
		return View::make('index.home')->with(array(
				'posters' 	=> $posters,
				'topics'	=> $topics,
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
		if(count($gifts_like) > 9)
		{
			$gifts_like = array_slice($gifts_like,0,9);
		}
		$gift_photo_intros = GiftPhotoIntro::where('gift_id','=', $gift_id)->get();
		// dd($gift->taobao_url); 
		return View::make('index/goodDetails')->with(array(
				'gift' 		=> $gift,
				'gift_posters' 	=> $gift_posters,
				'focus_users' 	=> $focus_users,
				'gifts_like'	=> $gifts_like,
				'gift_photo_intros' => $gift_photo_intros
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
		$topic_id = Input::get('topic_id');
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
