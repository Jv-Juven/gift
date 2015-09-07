<?php

class MysqlController extends BaseController{

	public function mysql()
	{
		$gifts 				= Gift::all();//礼品
		$topics 			= Topic::all(); // 话题
		$gift_posters 		= GiftPoster::all();//礼品海报
		$gift_photo_intros 	= GiftPhotoIntro::all();//图文介绍

		fwrite(fopen(app_path().'/docs/mysql.txt',, 'w+'), json_encode($gifts));

		
	}
}