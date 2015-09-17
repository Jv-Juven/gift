<?php

class HomeController extends BaseController {

	//收藏礼品<<<< 事务 >>>>>
	public function collection()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>10, 'message' => '请登录'));

		$gift_id 	= Input::get('gift_id');
		/* 2015-09-16 hyy 改 start */
		$gift_focus = GiftFocus::where('user_id','=', Sentry::getUser()->id)
							   ->where('gift_id', '=', $gift_id)->first();

		if( isset( $gift_focus ) )
		{
			if(!$gift_focus->delete())
				return Response::json(array('errCode'=>2, 'message'=>'取消收藏失败！'));
		/* 2015-09-16 hyy 改 end */
			return Response::json(array('errCode'=>0, 'message'=>'cancel'));
		}else{
			$gift_focus = New GiftFocus;
			$gift_focus->user_id = Sentry::getUser()->id;
			$gift_focus->gift_id = $gift_id;
			if(!$gift_focus->save())
				return Response::json(array('errCode'=>3, 'message'=>'收藏失败！'));
			return Response::json(array('errCode'=>0, 'message'=>'collect'));
		}
	}
	//<<<< 事务 >>>>>
	public function topicCollection()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>10, 'message' => '请登录'));

		$topic_id 	= Input::get('topic_id');
		/* 2015-09-16 hyy 改 start */
		$topic_focus = TopicFocus::where( 'user_id', Sentry::getUser()->id )
								 ->where( 'topic_id', $topic_id )
								 ->first();

		if( isset( $topic_focus ) )
		{
			if(!$topic_focus->delete())
				return Response::json(array('errCode'=>2, 'message'=>'取消收藏失败！'));
		/* 2015-09-16 hyy 改 end */
			return Response::json(array('errCode'=>0, 'message'=>'取消收藏成功！'));
		}else{
			$topic_focus = New TopicFocus;
			$topic_focus->user_id = Sentry::getUser()->id;
			$topic_focus->topic_id = $topic_id;
			if(!$topic_focus->save())
				return Response::json(array('errCode'=>3, 'message'=>'收藏失败！'));
			return Response::json(array('errCode'=>0, 'message'=>'收藏成功！'));
		}
	}
}