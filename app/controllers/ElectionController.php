<?php

class ElectionController extends BaseController{

	//选礼
	public function select()
	{
		$word = Input::get('word');
		if(!isset($word))
			return Response::json(array('errCode'=>1, 'message'=>'请输入关键字以搜索商品！'));
		//TomLingham/Laravel-Searchy插件——模糊搜索
		$gifts = Gift::where('title', 'like', '%'.$word.'%')->orderBy('created_at', 'asc')->get();
		// if(Request::ajax())
		// {
			if(count($gifts) == 0)
			{
				$gifts = Gift::orderBy('created_at', 'desc')->get();
				return Response::json(array('errCode'=>0, 'message'=>'返回根据关键字筛选的商品', 'gifts'=>$gifts));
			}
			return Response::json(array('errCode'=>0, 'message'=>'返回根据关键字筛选的商品', 
									'gifts'=>$gifts,
									'label'=>ElectionPageController::label();
										));
		// }
	}

	//价格
	public function price()
	{
		session_start();
		$low_price 	= Input::get('low_price');
		$high_price 	= Input::get('high_price');
 		if(!isset($low_price) || !isset($high_price))
			return Response::json(array('errCode'=>1, 'message'=>'请选择价格区间！'));
		$gifts = Gift::whereBetween('price', array($low_price, $high_price))->orderBy('created_at', 'asc')->get();
		if(count($gifts) != 0 )
		{
			foreach($gifts as $gift)
			{
				$gift->picture_url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回按价格分类礼品','gifts'=>$gifts));
	}

	//场合
	public function scene()
	{
		$scene_id = Input::get('scene_id');
		if(!isset($scene_id))
			return Response::json(array('errCode'=>1, 'message'=>'请选择场景类型！'));
		$gifts = Gift::where('scene_id','=', $scene_id)->orderBy('created_at', 'asc')->get();
		if(count($gifts) != 0 )
		{
			foreach($gifts as $gift)
			{
				$gift->picture_url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回按场景分类礼品','gifts'=>$gifts));
	}

	//个性
	public function charactor()
	{
		$charactor_id = Input::get('charactor_id');
		if(!isset($charactor_id))
			return Response::json(array('errCode'=>1, 'message'=>'请选择个性类型！'));
		$gifts = Gift::where('charactor_id','=', $charactor_id)->orderBy('created_at', 'asc')->get();
		if(count($gifts) != 0 )
		{
			foreach($gifts as $gift)
			{
				$gift->picture_url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回按个性分类礼品','gifts'=>$gifts));
	}

	//对象
	public function object()
	{
		$object_id = Input::get('object_id');
		if(!isset($object_id))
			return Response::json(array('errCode'=>1, 'message'=>'请选择个性类型！'));
		$gifts = Gift::where('object_id','=', $object_id)->orderBy('created_at', 'asc')->get();
		if(count($gifts) != 0 )
		{
			foreach($gifts as $gift)
			{
				$gift->picture_url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			}
		}
		return Response::json(array('errCode'=>0, 'message'=>'返回按对象分类礼品','gifts'=>$gifts));
	}

}