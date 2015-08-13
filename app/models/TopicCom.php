<?php

class   TopicCom extends Eloquent{
	protected $table = 'topic_coms';

	protected $fillable = array(
		'user_id',
		'topic_id',
		't_join_id',
		'content',
		'reply_num'
	);

}