<?php

class ElectionPageController extends BaseController{

	//选礼首页
	public function election()
	{
		$search = Search::orderBy('count', 'desc')->take(20)->get();
		// dd($search);
		if(Request::ajax())
			return Response::json(array('errCode'=>0, 'message'=>'返回热搜词','serach'=>$search));
	}

	
	
}