<?php

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;

class qiniu_delete{

    public function fire( $job, $keys ){

        $qiniu_config = Config::get( 'qiniu' );

        $auth = new Auth( $qiniu_config['accessKey'], $qiniu_config['secretKey'] );
        $bucket_manager = new BucketManager( $auth );

        foreach ( $keys as $key ){
            $response = $bucket_manager->delete( $qiniu_config['buckets'][0], $key );
            if ( $response ){
                Log::info( "Error in delete key:$key".$response->message() );
            }
        }
    }
}

class UploadController extends BaseController {

	public function getUpToken()
	{
        $qiniu_config = Config::get( 'qiniu' );

		$auth = new Auth( $qiniu_config['accessKey'], $qiniu_config['secretKey'] );
		
		return Response::json(array(
            "uptoken" => $auth->uploadToken( $qiniu_config['buckets'][0] ) ));
	}

	public function getAppUpToken()
	{
		$auth = new Auth( $qiniu_config['accessKey'], $qiniu_config['secretKey'] );

		return Response::json(array(
            'errCode'=>0,
            'message'=>'返回token',
            'uptoken' => $auth->uploadToken( $qiniu_config['buckets'][0] ) ));
	}

    public function deletePicture(){

        if ( Input::has( 'keys' ) ){
            Queue::push( 'qiniu_delete', Input::get( 'keys' ) );
        }
        
        return Response::make('');
    }
}
