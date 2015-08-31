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
}