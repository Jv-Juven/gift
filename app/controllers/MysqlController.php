<?php

class MysqlController extends BaseController{

	public function extractData()
	{
		$gifts 				= Gift::all();//礼品
		$topics 			= Topic::all(); // 话题
		$gift_posters 		= GiftPoster::all();//礼品海报
		$gift_photo_intros 	= GiftPhotoIntro::all();//图文介绍
		// fwrite(fopen(app_path().'\storage\mysq.txt', 'w'), 'man');
		file_put_contents(app_path().'/storage/gifts.txt', json_encode($gifts));
		file_put_contents(app_path().'/storage/topics.txt', json_encode($topics));
		file_put_contents(app_path().'/storage/gift_posters.txt', json_encode($gift_posters));
		file_put_contents(app_path().'/storage/gift_photo_intros.txt', json_encode($gift_photo_intros));
		return 0;		
	}

	public function insertData()
	{
		$gifts = json_decode(file_get_contents(app_path().'/storage/gifts.txt'));
		$topics = json_decode(file_get_contents(app_path().'/storage/topics.txt'));
		$gift_posters = json_decode(file_get_contents(app_path().'/storage/gift_posters.txt'));
		$gift_photo_intros = json_decode(file_get_contents(app_path().'/storage/gift_photo_intros.txt'));
		
		foreach( $topics as $topic)
		{
			$t = New Topic;
			$t->id = $topic->id;
			$t->title = $topic->title;
			$t->content = $topic->content;
			$t->topic_url = $topic->topic_url;
			if( !$t->save())
				return 'topic_false';
		}
		
		foreach( $gifts as $gift)
		{
			$g = New Gift;
			$g->id = $gift->id;
			$g->topic_id = $gift->topic_id;
			$g->title = $gift->title;
			$g->price = $gift->price;
			$g->content = $gift->content;
			if(!$g->save())
				return 'gift_false';
		}


		foreach( $gift_posters as $gift_poster)
		{
			$tp = New GiftPoster;
			$tp->gift_id = $gift_poster->gift_id;
			$tp->url = $gift_poster->url;
			if( !$tp->save())
				return 'gift_poster_false';
		}

		foreach( $gift_photo_intros as $gift_photo_intro)
		{
			$gpi = New GiftPhotoIntro;
			$gpi->gift_id = $gift_photo_intro->gift_id;
			$gpi->url = $gift_photo_intro->url;
			if(!$gpi->save())
				return 'gift_photo_intro_false';
		} 
			return Response::json(array('errCode'=>0, 'message'=>'插入成功'));
	}
}