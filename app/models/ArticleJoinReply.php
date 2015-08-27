<?php

class ArticleJoinReply extends Eloquent{
	protected $table = 'article_join_replys';

	protected $fillable = array(
		'com_id',
		'sender_id',
		'receiver_id',
		'content'
	);
}