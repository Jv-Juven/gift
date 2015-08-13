<?php

class  Feedback extends Eloquent{
	protected $table = 'feedbacks';

	protected $fillable = array(
		'user_id',
		'content'
	);

}