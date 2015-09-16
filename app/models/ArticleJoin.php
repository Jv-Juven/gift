<?php

class ArticleJoin extends Eloquent{

	protected $table = 'article_joins';

	protected $fillable = array(
		'article_id',
		'user_id',
		'scan_num',
		'com_num',
		'focus_num'
	);

    public function parts(){
        
        return $this->hasMany( 'ArticleJoinPart', 'join_id', 'id' );
    }

    public function user(){
        
        return $this->belongsTo( 'User', 'user_id', 'id' );
    }

    public function comment(){

        return $this->hasMany( 'ArticleJoinCom', 'join_id', 'id' );
    }
}