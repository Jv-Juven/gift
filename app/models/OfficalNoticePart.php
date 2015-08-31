<?php

class OfficalNoticePart extends Eloquent{

	protected $table = 'offical_notice_parts';

	protected $fillable = array(
			'offical_id',
			'type',
			'content'
		);
}