<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => array(
		'domain' => '',
		'secret' => '',
	),

	'mandrill' => array(
		'secret' => '',
	),

	'stripe' => array(
		'model'  => 'User',
		'secret' => '',
	),

	'qq' => array(
		'client_id'=>'101250808',
		 'client_secret' => '8fa68d1e497d7e2759afa38fbd24a545',
		 'redirect' => 'http://gift.zerioi.com/home'
	),

);
