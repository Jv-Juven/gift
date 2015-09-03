<?php

class StaticController extends BaseController{

	public static function imageWH($url)
	{
		if(ends_with($url,'jpg') || nds_with($url,'jpg'))
		{
			$image = imagecreatefromjpeg($url);
			$imageW = imagesy($image); 
			$imageH = imagesx($image); 
			
		}

		if(ends_with($url, 'gif'))
		{
			$image = imagecreatefromgif($url);
			$imageW = imagesy($image);
			$imageH = imagesx($image); 

		}

		if(ends_with($url, 'png'))
		{
			$image = imagecreatefrompng($url);
			$imageW = imagesy($image); 
			$imageH = imagesx($image); 
		}
		return array('url'=>$url,'width'=>$imageW,'height'=>$imageH);
		
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

		//除数检查
		$per_page = $per_page ==  0 ? 1:$per_page;

		//总的页数
		$total_page = ceil($total_count/$per_page);

		//截取需要的数据
		$page_need = $page<1 ? 1:$page;
		$page_need = $page>$total_page ? $total_page:$page;

		//第一条数据的索引
		$first =  $page_need*$per_page;
		//最后一条的数据,需要判断是否超过了最大值
		$last = ($first + $per_page)>$total_count ? $total_count:($first+$per_page);

		$data_need = array();
		for($i= $first; $i<$last; $i++)
		{
			array_push($data_need, $array_data[$i]);
		}
		$data = $array_need->get();

		return $data;

	}

	public static function noticePage($per_page,$page,$array_data)
	{
		//根据数据库的数据算出总的条数
		$total_count = count($array_data);

		//除数检查
		$per_page = $per_page ==  0 ? 1:$per_page;

		//总的页数
		$total_page = ceil($total_count/$per_page);

		//截取需要的数据
		$page_need = $page<1 ? 1:$page;
		$page_need = $page>$total_page ? $total_page:$page;

		//第一条数据的索引
		$first =  $page_need*$per_page;
		//最后一条的数据,需要判断是否超过了最大值
		$last = ($first + $per_page)>$total_count ? $total_count:($first+$per_page);

		$data_need = array();
		for($i= $first; $i<$last; $i++)
		{
			array_push($data_need, $array_data[$i]);
		}

		return $data_need;

	}

	//根据时间戳的时间降序排列
	public static function arraySortByCreatedAt($array_data)
	{
		$created_at = array(); //创建空数组存取创建时间
		foreach ($array_data as $value) 
		{
			array_push($created_at,$value['created_at']);
		}
		arsort($created_at);//降序排列
		// dd($created_at);
		// dd($array_data);
		$data = array();
		foreach( $created_at as $value)
		{
			foreach($array_data as $object)
			{
				if($value == $object['created_at'])
				{
					array_push($data, $object);
				}
			}
		}
		return $data;
	}

	public static function gifts()
	{
		$gifts = Gift::orderBy('created_at','desc')->get();

		return $gifts;
	}

}