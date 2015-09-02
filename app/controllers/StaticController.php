<?php

class StaticController extends BaseController{

	public static function imageW($url)
	{
		if(ends_with($url,'jpg'))
			$image = imagecreatefromjpeg($url);

		if(ends_with($url, 'gif'))
			$image = imagecreatefromgif($url);

		if(ends_with($url, 'png'))
			$image = imagecreatefrompng($url);

	}

	public static function imageH($url)
	{
		if(ends_with($url,'jpg'))
			$image = imagecreatefromjpeg($url);

		if(ends_with($url, 'gif'))
			$image = imagecreatefromgif($url);

		if(ends_with($url, 'png'))
			$image = imagecreatefrompng($url);
	}

	public function test()
	{
		// $url= 'http://7xl6gj.com1.z0.glb.clouddn.com/19.3.jpg';
		// return $this->imageH($url);
		$user = DB::table('users')->orderBy('created_at','desc');
		$user = $user->where('id','=',1)->get();
		dd($user);
	}

	public static function page($per_page,$page,$array_data)
	{
		//根据数据库的数据算出总的条数
		$total_count = count($array_data);

		//总的页数
		$total_page = ceil($total_count/$per_page);

		//截取需要的数据
		$page_need = $page<1 ? 1:$page;
		$page_need = $page>$total_page ? $total_page:$page;

		//第一条数据的索引
		$first =  $page_need*$per_page;
		//最后一条的数据
		$last = $first + $per_page;

		$data_need = $array_data->whereBetween('id',array($first, $last))->get();

		return $data_need;

	}




}