<?php

class  Topic extends Eloquent{

	protected $table = 'topics';

	protected $fillable = array(
			'title',
			'content',
			'topic_url',
			'scan_num',
			'join_num',
			'focus_num'
		);
}