<?php

class ArticleJoinPart extends Eloquent{
	protected $table = 'article_join_parts';

	protected $fillable = array(
		'join_id',
		'content',
		'type'
	);

    public function join(){
        return $this->belongsTo( 'ArticleJoin', 'join_id', 'id' );
    }
}