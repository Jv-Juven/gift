<?php

class ArticleJoinReply extends Eloquent{

	protected $table = 'article_join_replys';

	protected $fillable = array(
		'com_id',
		'sender_id',
		'receiver_id',
		'content',
		'status',
		'is_delete'
	);

    public function comment(){

        return $this->belongsTo( 'ArticleJoinCom', 'com_id', 'id' );
    }

    public function sender(){

        return $this->belongsTo( 'User', 'sender_id', 'id' );
    }

    public function receiver(){

        return $this->belongsTo( 'User', 'receiver_id', 'id' );
    }
}