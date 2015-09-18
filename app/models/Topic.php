<?php

class Topic extends Eloquent{

	protected $table = 'topics';

	protected $fillable = array(
		'title',
		'content',
		'topic_url',
		'scan_num',
		'join_num',
		'focus_num'
	);

    // 注册模型事件 -- 创建时生成对应二维码
    public static function boot(){

        // 执行父类注册事件
        parent::boot();

        // 监听创建事件
        self::created(function( $topic ){

            QRcodeController::create_and_upload(
                'topic'.$topic->id,
                URL::to( '/home/topic' ).'?topic_id='.$topic->id
            );
        });
    }
}