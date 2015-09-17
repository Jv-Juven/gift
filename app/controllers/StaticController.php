<?php

class StaticController extends BaseController{

	public static function imageWH($url)
	{
		if(ends_with($url,'jpg') || ends_with($url,'jpg'))
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
		// dd($total_count);
		//总的页数
		$total_page = ceil($total_count/$per_page);
		//除数检查
		if($per_page <= 0)
			return array();

		//截取需要的数据
		if($page>$total_page)
			return array();

		//第一条数据的索引
		$first =  ($page-1)*$per_page;
		//最后一条的数据,需要判断是否超过了最大值
		$last = ($first+$per_page-1)>($total_count-1) ? ($total_count-1):($first+$per_page-1);

		$data_need = array();
		for($i= $first; $i<($last+1); $i++)
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
		foreach($gifts as $gift)
		{
			$url = GiftPoster::where('gift_id','=',$gift->id)->first()->url;
			$gift->img = StaticController::imageWH($url);
		}
		return $gifts;
	}

	public static function stringToArray($string)
	{	
		$data = array();
		if(str_contains($string,'&'))
		{	
			//获得refresh_token=4CEA11
			$arr = explode('&', $string);
			foreach( $arr as $values)
			{	
				//获得refresh_token 和 4CEA11
				$value = explode('=', $values);
				$data = array_merge($data, array($value[0]=>$value[1]));
			}
				return $data;
		}
		$string = explode('=', $string);
		$data = array_merge($data, array($string[0]=>$string[1]));
		return $data;
	}

}