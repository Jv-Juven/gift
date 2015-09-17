<?php
// try
// {
// 	DB::transaction(function() use(  ) {

// 	});

// }catch(\Exception $e)
// {
// 	return Response::json(array('errCode'=>11,'message'=>'操作失败' ));
// }
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
			try
			{
				DB::transaction(function() use( $gift_id,$gift_focus ) {
					//礼品收藏人数减1
					$gift = Gift::find($gift_id);
					$gift->focus_num = $gift->focus_num-1;
					$gift->save();
					$gift_focus->delete();
				});

			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败' ));
			}
		/* 2015-09-16 hyy 改 end */
			return Response::json(array('errCode'=>0, 'message'=>'cancel'));
		}else{
			try
			{
				DB::transaction(function() use( $gift_id ) {
					//礼品收藏人数加1
					$gift = Gift::find($gift_id);
					$gift->focus_num = $gift->focus_num+1;
					$gift->save();

					$gift_focus = New GiftFocus;
					$gift_focus->user_id = Sentry::getUser()->id;
					$gift_focus->gift_id = $gift_id;
					$gift_focus->save();
				});

			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败' ));
			}
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
			try
			{
				DB::transaction(function() use( $topic_focus,$topic_id ) {
					$topic = Topic::find($topic_id);
					$topic->focus_num = $topic->focus_num-1;
					$topic->save();
					$topic_focus->delete();
				});

			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败' ));
			}
		/* 2015-09-16 hyy 改 end */
			return Response::json(array('errCode'=>0, 'message'=>'取消收藏成功！'));
		}else{
			try
			{
				DB::transaction(function()  use( $topic_id ){
					$topic_focus = New TopicFocus;
					$topic_focus->user_id = Sentry::getUser()->id;
					$topic_focus->topic_id = $topic_id;
					$topic_focus->save();

					$topic = Topic::find($topic_id);
					$topic->focus_num = $topic->focus_num+1;
					$topic->save();
				});

			}catch(\Exception $e)
			{
				return Response::json(array('errCode'=>11,'message'=>'操作失败' ));
			}
			return Response::json(array('errCode'=>0, 'message'=>'收藏成功！'));
		}
	}
}