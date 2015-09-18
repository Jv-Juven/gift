<?php

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;

class qiniu_delete{

    protected static $accessKey     = Config::get('qiniu.accessKey');
    protected static $secretKey     = Config::get('qiniu.secretKey');
    protected static $delete_url    = Config::get('qiniu.upload_url').'/delete/';
    protected static $bucket        = 'gift';

    public function fire( $job, $keys ){

        $auth = new Auth( self::$accessKey, self::$secretKey );
        $bucket_manager = new BucketManager( $auth );

        foreach ( $keys as $key ){
            $response = $bucket_manager->delete( self::$bucket, $key );
            if ( $response ){
                Log::info( "Error in delete key:$key".$response->message() );
            }
        }
    }
}

class UploadController extends BaseController {

    protected static $accessKey = Config::get('qiniu.accessKey');
    protected static $secretKey = Config::get('qiniu.secretKey');
    protected static $bucket    = 'gift';

	public function getUpToken()
	{
		$auth = new Auth( self::$accessKey, self::$secretKey );
		
		return Response::json(array(
            "uptoken" => $auth->uploadToken( self::$bucket ) ));
	}

	public function getAppUpToken()
	{
		$auth = new Auth( self::$accessKey, self::$secretKey );

		return Response::json(array(
            'errCode'=>0,
            'message'=>'返回token',
            'uptoken' => $auth->uploadToken( self::$bucket ) ));
	}

    public function deletePicture(){

        if ( Input::has( 'keys' ) ){
            Queue::push( 'qiniu_delete', Input::get( 'keys' ) );
        }
        
        return Response::make('');
    }
}

