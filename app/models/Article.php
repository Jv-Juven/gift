<?php

class Article extends Eloquent{
	protected $table = 'articles';

	protected $fillable = array(
		'title',
		'scan_num',
		'join_num',
		'focus_num',
		'hot_offical'
	);

	public function parts()
	{
		return $this->hasMany('ArticlePart','article_id','id');
	}
}