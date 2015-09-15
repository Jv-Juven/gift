<?php

return array(
	'title' => '话题内容',

	'single' => '话题内容',

	'model' => 'ArticlePart',

	'columns' => array(
		'article_id' =>array(
			'title' => '话题id'			
		),
		'content' => array(
			'title' => '内容'
		),
		'type' =>array(
			'title' => '内容类型'			
		),
	),

	'edit_fields' => array(
		'article_id' =>array(
			'title' => '话题id'			
		),
		'content' => array(
			'title' => '内容'
		),
		'type' =>array(
			'title' => '内容类型'	,
			'type' => 'enum',
			'options'=>array(
				'url',
				'text'
			),		
		),
	),
);	