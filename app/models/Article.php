<?php

class Article extends Eloquent{
	protected $table = 'articles';

	protected $fillable = array(
		'title',
		'scan_num',
		'join_num',
		'focus_num'
	);
}