<?php

class PcJoinArticleController extends BaseController{
	//参与话题
	public function issue()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();

		$data = json_decode(Input::get('data'));
		// Log::info(Input::get('data'));
		$article_id = $data->article_id;	
		// Log::info($article_id);
		$article = Article::find($article_id);
		if(!isset($article))
			return Response::json(array('errCode'=>2,'message'=>'你想参与的话题不存在！'));
		$contents = $data->content;
		if(!is_array($contents) || !count($contents))
			return Response::json(array('errCode'=>3,'message'=>'内容不能为空！'));
		
		$article_join = New ArticleJoin;
		$article_join->article_id = $article_id;
		// $article_join->user_id = 1;
		$article_join->user_id = $user->id;
		if(!$article_join->save())
			return Response::json(array('errCode'=>4, 'message'=>'参与话题创建失败！'));
		foreach($contents as $content)
		{
			$article_join_part = New ArticleJoinPart;
			$article_join_part->join_id = $article_join->id;
			if(isset($content->text))
				$key = "text";
			else
				$key = "url";
			$article_join_part->type = $key;
			// Log::info($article_join_part->type);
			$article_join_part->content = $content->$key;
			// Log::info($article_join_part->content);
			if(!$article_join_part->save())
				return Response::json(array('errCode'=>5,'message'=>'参与话题保存不完整，请重新编辑！'));
		}
		
		return Response::json(array('errCode'=>0, 'message'=>'保存成功！'));
	}

	 //编辑掺产于话题
	public function edit()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $join_id = Input::get('join_id');	
		$data = json_decode(Input::get('data'));
		$join_id = $data->join_id;
		$article_join = ArticleJoin::find($join_id);

		if(!isset($article_join))
			return Response::json(array('errCode'=>2,'message'=>'你想参与的话题不存在！'));
		// $content=array('text'=>'测试数据');
		// $content = Input::get('content');
		$contents = $data->content;
		if(!is_array($contents) || !count($contents))
			return Response::json(array('errCode'=>3,'message'=>'内容不能为空！'));
		
		if($user->id != $article_join->user_id)
			return Response::json(array('errCode'=>4,'message'=>' [权限不够]不可编辑他人的参与话题！'));
		//返回删除条数
		$article_join_parts = ArticleJoinPart::where('join_id', '=', $join_id)->delete();
		if($article_join_parts == 0)
			return Response::json(array('errCode'=>5, 'message'=>'[数据库错误]参与话题编辑失败！'));

		foreach($contents as $content)
		{
			$article_join_part = New ArticleJoinPart;
			$article_join_part->join_id = $article_join->id;
			if(isset($content->text))
				$key = "text";
			else
				$key = "url";
			$article_join_part->type = $key;
			$article_join_part->content = $content->$key;
			if(!$article_join_part->save())
				return Response::json(array('errCode'=>6,'message'=>'编辑话题保存不完整，请重新编辑！'));
		}
		
		return Response::json(array('errCode'=>0, 'message'=>'编辑成功！'));
	}

	//删除话题
	public function dArticle()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		$join_id = Input::get('join_id');	
		$article_join = ArticleJoin::find($join_id);
		if(!isset($article_join))
			return Response::json(array('errCode'=>2,'message'=>'你想删除的参与话题不存在！'));

		if($user->id != $article_join->user_id)
			return Response::json(array('errCode'=>3,'message'=>' [权限不够]不可删除他人的参与话题！'));

		$article_join_parts = ArticleJoinPart::where('join_id', '=', $join_id)->delete();
		if($article_join_parts == 0)
			return Response::json(array('errCode'=>4, 'message'=>'[数据库错误]文章没内容！'));

		if(!$article_join->delete())
			return Response::json(array('errCode'=>5, 'message'=>'[数据库错误]参与话题删除失败！'));
		
		return Response::json(array('errCode'=>0, 'message'=>'[数据库错误]参与话题删除成功！'));
	}
}