<?php

class ElectionPageController extends BaseController{

	public function label()
	{
		$charactor = Charactor::all();
		$scene = Scene::all();
		$object = Object::all();
		// dd('man');	
		$price = Price::all();
		return Response::json(array('errCode'=>0,'message'=>'返回标签',
						'_char'=>$charactor,'scene'=>$scene,	
						'object'=>$object,'price'=>$price));
	}

	//选礼首页
	public function election()
	{
		$search = Search::orderBy('count', 'desc')->take(20)->get();
		// dd($search);
		if(Request::ajax())
			return Response::json(array('errCode'=>0, 'message'=>'返回热搜词','serach'=>$search));
	}

	
	
}