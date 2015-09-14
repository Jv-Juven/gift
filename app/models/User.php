<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array(
			'email',
			'username',
			'avatar',
			'gender',
			'birthday',
			'phone',	
			'role_id',
			'postion',
			'constellation',
			'info',
			'openid',
			'unionid',
			'qq_id'		
	);

	public function topic_joins()
	{
		return $this->hasMany('TopicJoin', 'user_id', 'id');
	}

	public function topic_coms()
	{
		return $this->hasMany('TopicCom', 'user_id', 'id');
	}

	public function topic_replys()
	{
		return $this->hasMany('TopicReply','user_id', 'id');
	}

	public function feedbacks()
	{
		return $this->hasMany('Feedback', 'user_id', 'id');
	}

	public function topic_focus()
	{
		return $this->hasMany('TopicFocus', 'user_id', 'id');
	}

	public function t_join_focus()
	{
		return $this->hasMany('TJoinFocus', 'user_id', 'id');
	}

	public function notices()
	{
		return $this->hasMany('Notice', 'user_id', 'id');
	}

	public function focus()
	{
		return $this->belongsToMany('Gift', 'gift_focus', 'user_id', 'gift_id');
	}
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
