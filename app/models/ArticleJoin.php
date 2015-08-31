<?php

class ArticleJoin extends Eloquent{

	protected $table = 'article_joins';

	protected $fillable = array(
		'article_id',
		'user_id',
		'scan_num',
		'join_num',
		'focus_num'
	);
}