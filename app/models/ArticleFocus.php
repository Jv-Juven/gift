<?php

class ArticleFocus extends Eloquent{
	protected $table = 'article_focus';

	protected $fillable = array(
			'user_id',
			'article_id'
		);

}