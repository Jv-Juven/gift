<?php

use Qiniu\Auth;

class UploadController extends BaseController {
	public function getUpToken()
	{
		$accessKey = 'KnOa3BkwBgjUSOm6TqvtYoARkhGM7blkOIq7G9Mg';
		$secretKey = '0XmYlKCYaushdgA-R9_d87hyvYPsHDKTnVQTW2Q5';
		$auth = new Auth($accessKey, $secretKey);
		$bucket = 'gift';
		$upToken = $auth->uploadToken($bucket);
		return Response::json(array("uptoken" => $upToken));
	}

	public function getAppUpToken()
	{
		$accessKey = 'KnOa3BkwBgjUSOm6TqvtYoARkhGM7blkOIq7G9Mg';
		$secretKey = '0XmYlKCYaushdgA-R9_d87hyvYPsHDKTnVQTW2Q5';
		$auth = new Auth($accessKey, $secretKey);
		$bucket = 'gift';
		$upToken = $auth->uploadToken($bucket);
		return Response::json(array('errCode'=>0,'message'=>'返回token',"uptoken" => $upToken));
	}
}

