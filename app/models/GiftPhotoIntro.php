<?php

class GiftPhotoIntro  extends Eloquent{
	protected $table = 'gift_photo_intros';

	protected $fillable = array(
		'gift_id',
		'url'
	);

}