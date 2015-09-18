<?php

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

require_once( 'phpqrcode/qrlib.php' );

class QRcodeController extends BaseController{

    public function test(){

        return self::create_and_upload( 'qrcode'.time(), 'http://gift.zerioi.com/' );
    }
    
    /**
     * 生成二维码并上传到七牛
     *
     * @param $file_name    文件名
     * @param $content      二维码内容
     * @param $error        二维码容错级别
     * @param $size         二维码大小
     *
     * @return array    包含已上传文件的信息，类似：
     *                                              [
     *                                                  "hash" => "<Hash string>",
     *                                                  "key" => "<Key string>"
     *                                              ]
     */
    public static function create_and_upload( $file_name, $content, $error = 'L', $size = 6 ){

        $qiniu_config = Config::get( 'qiniu' );

        $qiniu_uploader = new UploadManager();

        $auth = new Auth( $qiniu_config['accessKey'], $qiniu_config['secretKey'] );

        $file_full_path = self::create_qrcode( $file_name, $content, $error, $size );

        return $qiniu_uploader->putFile(
            $auth->uploadToken( $qiniu_config['buckets'][0] ),
            $file_name,
            $file_full_path
        );
    }

    protected static $file_path = 'public/images/qrcode/';

    protected static $file_ext = '.png';

    /**
     * 生成二维码
     *
     * @param $file_name    文件名
     * @param $content      二维码内容
     * @param $error        二维码容错级别
     * @param $size         二维码大小
     *
     * @return $string      包括相对目录的文件名
     */

    public static function create_qrcode( $file_name, $content, $error = 'L', $size = 6 ){

        $file_full_path = self::$file_path.$file_name.self::$file_ext;

        if ( File::exists( $file_full_path ) ){
            throw new Exception( 'File "'.$file_name.'" already exists in '.self::$file_path );
        }

        try{
            
            QRcode::png( $content, $file_full_path, $error, $size, 2 );

        }catch( Exception  $e ){

            throw $e;
        }
        
        return $file_full_path;
    }
}