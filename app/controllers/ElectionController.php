<?php

class ElectionController extends BaseController{

	public function addGiftImg($gifts)
	{
		foreach( $gifts as $gift)
		{
			$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			$gift->img =  StaticController::imageWH($url);
		}
		return $gifts;
	}

	//选礼
	public function selectByWord()
	{
		$word = Input::get('word');
		if(!isset($word))
			return Response::json(array('errCode'=>1, 'message'=>'请输入关键字以搜索商品！'));
		//TomLingham/Laravel-Searchy插件——模糊搜索
		$gifts = Gift::where('title', 'like', '%'.$word.'%')->orderBy('created_at', 'desc')->get();
		
		$per_page = Input::get('per_page');
		$page = Input::get('page');

		//筛选没有结果返回全部礼品
		if(count($gifts) == 0)
		{	
			$gifts = DB::table('gifts')->orderBy('created_at', 'desc')->get();
			if(count($gifts))
				return Response::json(array('errCode'=>2, 'message'=>'数据库没有数据'));

			$total = $per_page == ceil(count($gifts)/$per_page);
			foreach($gifts as $gift)
			{
				$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
				$gift->img = StaitcController::imageWH($url);
			}
			$gifts = StaitcController::page($per_page, $page, $gifts);
				return Response::json(array('errCode'=>0, 'message'=>'返回根据关键字筛选的商品', 'gifts'=>$gifts));
		}
		
		foreach($gifts as $gift)
		{
			$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			$gift->img = StaitcController::imageWH($url);
		}

		$total = ceil(count($gifts)/$per_page);
		$gifts = StaitcController::page($per_page,$page,$gifts);
		return Response::json(array('errCode'=>0, 'message'=>'返回根据关键字筛选的商品', 
									'gifts'=>$gifts,
										));
	}


	//选礼接口
	public function selectByLabel()
	{
		$inputs = array(
			'char_id'	=> Input::get('_char'),
			'scene_id'	=> Input::get('scene'),
			'object_id' => Input::get('object'),
			'price_id' 	=> Input::get('price')
		);
		// dd($inputs['object_id']);
		$per_page = Input::get('per_page');
		$page = Input::get('page');

		$inputs = array_filter( $inputs );
		// dd(count($inputs));
		$query = null;
		// dd($inputs['price_id']);
		foreach( $inputs as $key => $value ){
			if ( $query != null ){
				$query = $query->where( $key, $value );
			}else{
				$query = Gift::where( $key, $value );
			}
		}
		if( $query == null)
		{// dd(count($gifts));
		//标签没有的情况
			// $gifts = StaticController::gifts();
			$gifts = Gift::orderBy('created_at','desc')->get();
			$total = ceil(count($gifts)/$per_page);
			$gifts = StaticController::page($per_page,$page,$gifts);
			$gifts = $this->addGiftImg($gifts);
			return Response::json(array('errCode'=>0, 'message'=>'没有筛选礼品,返回全部',
										'gifts'=>$gifts,
										'total'=>$total
										));
		}
		
		$gifts = $query->get();
		if( count($gifts) == 0 )
		{
			// $gifts = StaticController::gifts();
			$gifts = Gift::orderBy('created_at','desc')->get();
			$total = ceil(count($gifts)/$per_page);
			$gifts = StaticController::page($per_page,$page,$gifts);
			$gifts = $this->addGiftImg($gifts);
			return Response::json(array('errCode'=>0, 'message'=>'没有筛选礼品,返回全部',
										'gifts'=>$gifts,
										'total'=>$total
										));
		}

		$total = ceil(count($gifts)/$per_page);
		$gifts = StaticController::page($per_page,$page,$gifts);
		$gifts = $this->addGiftImg($gifts);
		return Response::json(array('errCode'=>0, 'message'=>'返回搜索数据',
									'gifts'=>$gifts,
									'total'=>$total
									));
	}

}