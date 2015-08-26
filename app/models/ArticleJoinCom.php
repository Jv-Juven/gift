<?php

class ArticleJoinCom extends Eloquent{
	protected $table = 'article_join_coms';

	protected $fillable = array(
		'user_id',
		'join_id',
		'content',
	);
}