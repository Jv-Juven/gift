<?php

class TopicCom extends Eloquent{
	protected $table = 'topic_coms';

	protected $fillable = array(
		'sender_id',
		'topic_id',
	);
}