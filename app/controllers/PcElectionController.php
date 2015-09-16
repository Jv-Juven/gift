<?php 

class PcElectionController extends BaseController{

	public function addGiftPhotoAndFocus($gifts)
	{
		foreach( $gifts as $gift)
		{
			$gift->url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			if( Sentry::check())
			{
				$gift_focus = GiftFocus::where('user_id', '=', Sentry::getUser()->id)->first();
				if(isset($gift_focus))
					$gift->type = 1;
				$gift->type =0;
			}
			$gift->type =0;
		}
		return $gifts;
	}
	//标签
	public function label()
	{
		$charactor = Charactor::all();
		$scene = Scene::all();
		$object = Object::all();
		// dd('man');	
		$price = Price::all();
		return View::make('pc.search')->with(array('errCode'=>0,'message'=>'返回标签',
						'_char'=>$charactor,'scene'=>$scene,	
						'object'=>$object,'price'=>$price));
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
			$gifts = Gift::all();
			$total = ceil(count($gifts)/$per_page);
			$gifts = StaticController::page($per_page,$page,$gifts);
			$gifts = $this->addGiftPhotoAndFocus($gifts);
			return Response::json(array('errCode'=>0, 'message'=>'没有筛选礼品,返回全部1',
										'gifts'=>$gifts,
										'total'=>$total
										));
		}
		
		$gifts = $query->get();
		if( count($gifts) == 0 )
		{
			$gifts = Gift::all();
			$total = ceil(count($gifts)/$per_page);
			$gifts = StaticController::page($per_page,$page,$gifts);
			$gifts = $this->addGiftPhotoAndFocus($gifts);
			return Response::json(array('errCode'=>0, 'message'=>'没有筛选礼品,返回全部2',
										'gifts'=>$gifts,
										'total'=>$total
										));
		}

		$total = ceil(count($gifts)/$per_page);
		$gifts = StaticController::page($per_page,$page,$gifts);
		$gifts = $this->addGiftPhotoAndFocus($gifts);
		return Response::json(array('errCode'=>0, 'message'=>'返回搜索数据',
									'gifts'=>$gifts,
									'total'=>$total
									));
	}
}