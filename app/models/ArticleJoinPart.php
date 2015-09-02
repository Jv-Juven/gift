<?php

class ArticleJoinPart extends Eloquent{
	protected $table = 'article_join_parts';

	protected $fillable = array(
		'join_id',
		'content',
		'type'
	);
}