<?php

class  Topic extends Eloquent{

	protected $table = 'topics';

	protected $fillable = array(
			'user_id',
			'title',
			'content',
			'scan_num',
			'join_num',
			'focus_num'
		);
}