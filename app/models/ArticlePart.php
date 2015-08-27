<?php

class ArticlePart extends Eloquent{
	protected $table = 'article_parts';

	protected $fillable = array(
		'article_id',
		'content',
		'type'
	);
}