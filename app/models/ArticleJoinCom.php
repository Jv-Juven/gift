<?php

class ArticleJoinCom extends Eloquent{

	protected $table = 'article_join_coms';

	protected $fillable = array(
		'sender_id',
		'receiver_id',
		'join_id',
		'content',
		'status',
		'is_delete'
	);

    public function replies(){

        return $this->hasMany( 'ArticleJoinReply', 'com_id', 'id' );
    }

    public function sender(){

        return $this->belongsTo( 'User', 'sender_id', 'id' );
    }

    public function article_join(){

        return $this->belongsTo( 'ArticleJoin', 'join_id', 'id' );
    }
}