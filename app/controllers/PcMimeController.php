<?php 

class PcMimeController extends BaseController{

	//个人中心静态页
	public function userCenter()
	{
		if(!Sentry::check())
		{
			return View::make('errors.missing');
		}
		return View::make('pc.userCenter')->with(array('user'=>Sentry::getUser()));
		// return View::make('pc.userCenter')->with(array('user'=>User::find(1)));
	}

	//个人中心设置
	public function mineCenter()
	{
		if(!Sentry::check())
		{
			return View::make('errors.missing');
		}
		return View::make('pc.setting')->with(array('user'=>Sentry::getUser()));
		// return View::make('pc.setting')->with(array('user'=>User::find(1)));
	}
	//修改名字
	public function setName()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1,'message'=>'请登录'));
		$user = Sentry::getUser();
		$username = Input::get('username');
		if(!isset($username))
			return Response::json(array('errCode'=>2,'message'=>'请填写你的昵称'));
		$user->username = $username;
		if(!$user->save())
			return Response::json(array('errCode'=>1,'message'=>'昵称修改失败'));
		return Response::json(array('errCode'=>0,'message'=>'昵称修改成功'));
	}
	
	//更换头像
	public function setAvatar()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1,'message'=>'请登录'));
		$user = Sentry::getUser();
		$avatar = Input::get('avatar');
		if(!isset($avatar))
			return Response::json(array('errCode'=>2,'message'=>'请上传头像'));
		$user->avatar = $avatar;
		if(!$user->save())
			return Response::json(array('errCode'=>1,'message'=>'头像修改失败'));
		return Response::json(array('errCode'=>0,'message'=>'头像修改成功'));
	}

	//更换签名
	public function setSign()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1,'message'=>'请登录'));
		$user = Sentry::getUser();
		$info = Input::get('sign');
		if(!isset($info))
			return Response::json(array('errCode'=>2,'message'=>'请上传头像'));
		$user->info = $info;
		if(!$user->save())
			return Response::json(array('errCode'=>1,'message'=>'个性签名修改失败'));
		return Response::json(array('errCode'=>0,'message'=>'个性签名修改成功'));
	}

	//设置个人信息
	public function setInfo()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1,'message'=>'请登录'));
		$user 			= Sentry::getUser();
		$data = array(
		 	'gender' 		=> Input::get('gender'),
			'birthday' 		=> Input::get('birthday'),
			'constellation' => Input::get('constellation'),
			'postion' 		=> Input::get('postion')
			);
		$data = array_filter($data);
		if(count($data) != 0)
		{
			foreach($data as $key=>$value)
			{
				$user->$key = $value;
			}		
			if(!$user->save())
				return Response::json(array('errCode'=>2,'message'=>'[数据库错误]修改信息失败，请重新个填写'));
		}
		return Response::json(array('errCode'=>0, 'message'=>'个人信息修改成功'));
	}

	//我参与的话题
	public function joinArticle()
	{
		if(! Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		// $user = User::find(1);
		
		//分页
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$article_joins = ArticleJoin::where('user_id','=', $user->id)->orderBy('created_at', 'desc')->get();
		//总页数
		$total = ceil(count($article_joins)/$per_page);
		//参与话题
		$article_joins = StaticController::page($per_page, $page, $article_joins);
		if( $article_joins == false)
			return Response::json(array('errCode'=>0,'message'=>'该用户已没有参与话题！'));
		//根据用户参与的话题取到官方话题
		$articles = array();
		foreach($article_joins as $article_join)
		{
			$article = Article::where('id', '=', $article_join->article_id)->first();
			array_push($articles, $article);
		}
		//去掉重复值
		array_unique($articles);
		//取到每个话题的图片和首段文字
		foreach( $articles as $article)
		{
			$article_url = ArticlePart::where('article_id', '=', $article->id)
						->where('type','=', 'url')
						->orderBy('id','asc')
						->first();
			$article->img = $article_url;
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回参与话题的内容！',
						 'articles'=>$articles,
						 'total'=>$total
						 ));
	}

	//我喜欢的礼品
	public function likeGift()
	{
		if(!Sentry::check())
			return Response::json(array('errCode'=>1, 'message'=>'请登录'));
		$user = Sentry::getUser();
		 // $user = User::find(1);
		//获取我喜欢的礼品——动态属性
		//分页
		$per_page = Input::get('per_page');
		$page = Input::get('page');
		$gift_focus = DB::table('gift_focus')->where('user_id','=', $user->id)
											->orderBy('created_at', 'desc')
											->get();
		//总页数
		$total = ceil(count($gift_focus)/$per_page);
		// dd($total);
		//喜欢的礼品
		$focus = StaticController::page($per_page, $page, $gift_focus);
		// dd(count($focus));
		$gifts = array();
		if( $focus )
		{
			foreach($focus as $gift)
			{	
				array_push($gifts, Gift::find($gift->gift_id));
			}

			foreach($gifts as $candy)
			{
				$url = GiftPoster::where('gift_id','=',$candy->id)->first()->url;
				$candy->img = $url;
			}
		}
	
		return Response::json(array('errCode'=>0, 'message'=>'返回用户喜欢的礼品',
							'gifts'=>$gifts,
							'total'=>$total,
							));
	}


}