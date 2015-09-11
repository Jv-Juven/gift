<?php

class PcDetailController extends BaseController{

	//专题详情页
	public function topicDetail()
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
				$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
				// $gift->img = StaticController::imageWH($url);
				$gift->img = $url;
				$gift->number = $number++;
			}
		}
		// //专题评论
		// $topic_coms = TopicCom::where('topic_id','=',$topic_id)->get();
		// if(count($topic_coms)==0)
		// {	
		// 	$topic_coms =array();//如果评论为空，返回空数组
		// }else{
		// 	foreach( $topic_coms as $topic_com)
		// 	{
		// 		$user = User::find($topic_com->sender_id);
		// 		$topic->username = $user->username;
		// 		$topic->avatar = $user->avatar;
		// 		$com_parts = TopicComPart::where('topic_com_id','=', $topic_com->id)->get();
		// 		if(count($contents) != 0)//获取评论的内容
		// 		{
		// 			$topic_com->com_parts = $com_parts;
		// 		}
		// 		$topic_replys = TpoicReply::where('topic_id','=', $topic_id)
		// 									->where('topic_com_id','=', $topic_com->id)
		// 									->get();
		// 		if(count($topic_replys!=0))	
		// 		{
		// 			foreach($topic_replys as $topic_reply)
		// 			{
		// 				$reply_parts = TpoicReplyPart::where('topic_reply_id','=', $ $topic_reply->id)->get()
		// 				if(count($reply_parts) !=0)
		// 				{
		// 					$topic_reply->reply_parts = $reply_parts;
		// 				}						
		// 			}
		// 		}
		// 		$topic_com->replys = $topic_replys; 	
		// 	}
		// }
			return View::make('pc.topic')->with(array(
					'topic' 		=> $topic,
					'gifts'			=> $gifts,
					// 'topic_coms' 	=> $topic_coms
				));
	}

	//话题详情页
	public function articleDetail()
	{
		//话题部分
		$article_id = Input::get('article_id');
		$article = Article::find($article_id);
		if(!isset($article))
			return Response::view('errors.missing');
		$article_parts = ArticlePart::where('article_id','=', $article_id)->orderBy('id','asc')->get();//获取话题内容
		return View::make('pc.')->with(array(
						'article'		=>$article,
						'article_parts'	=>$article_parts,
					));
	}

	//话题页中参与话题信息
	public function brefJoin()
	{
		//参与话题部分
		$article_id = Input::get('article_id');
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$article_joins = DB::table('article_joins')->where('article_id', '=', $article_id)->get();
		//总页数
		$total = ceil(count($article_joins)/$per_page);
		//评论
		$article_joins = StaticController::page($per_page,$page,$article_joins);
		// dd(count($article_joins));
		if( $article_joins )
		{
			foreach($article_joins as $article_join)
			{
				$user_id = $article_join->user_id;
				$user = User::find($user_id);//参与话题人
				$article_join->username = $user->username;//参与话题人昵称
				$article_join->avatar = 	$user->avatar;//头像
				$text = ArticleJoinPart::where('join_id', '=', $article_join->id)
													->where('type', '=', 'text')
													->orderBy('id','asc')->first();
				if(isset($text))
				{
					$article_join->text = $text;
				}
				$urls = ArticleJoinPart::where('join_id', '=', $article_join->id)
													->where('type', '=', 'url')
													->orderBy('id','asc')->get();
				if(count($url)>4)
				{
					$urls = array_slice($urls,0,4);
				}
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回参与话题内容',
						'article_joins'		=>$article_joins,
						'total'=>$total
					));
	}

	//参与话题详情
	public function joinDetail()
	{	
		//参与话题内容
		$join_id = Input::get('join_id');
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::json(array('errCode'=>1, 'message'=>'没有该参与话题内容！'));
		$article_join_parts = ArticleJoinPart::where('join_id','=',$join_id)->orderBy('id','asc')->get(); 
			
		//评论内容
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$join_coms = DB::table('article_join_coms')->where('join_id', '=', $join_id)->orderBy('created_at','asc')->get();
		//总页数
		$total = ceil(count($join_coms)/$per_page);
		//文章
		$join_coms = StaticController::page($per_page,$page,$join_coms);
		if( $join_coms )
		{
			foreach($join_coms as $join_com)
			{	
				$join_com->username = User::find($join_com->sender_id)->username;
				$join_com->avatar = User::find($join_com->sender_id)->avatar;
				$join_com->replys = ArticleJoinReply::where('com_id', '=', $join_com->id)->orderBy('id','asc')->get();
				if(count($join_com->replys)!=0)
				{
					foreach($join_com->replys as $reply)
					{
						$reply->reply_name = User::find($reply->sender_id)->username;
					}
				}
			}
		}
		if($page == 1)
		{
			return View::make('pc.')->with(array(
							'article_join' 			=> $article_join,
							'article_join_parts' 	=> $article_join_parts,
							'join_coms' 			=> $join_coms,
							'total'					=> $total
						));
		}else{
			return Response::json(array('errCode'=>0, 'message'=>'返回参与话题详情',
							'join_coms' => $join_coms,
							'total'		=> $total
						));
		}
	}

}