<?php 

class TopicFocus extends Eloquent{
	protected $table = 'topic_focus';

	protected $fillable = array(
		'user_id',
		'topic_id'
	);
}