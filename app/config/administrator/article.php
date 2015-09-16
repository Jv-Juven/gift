<?php

return array(
	'title' => '话题标题',

	'single' => '话题标题',

	'model' => 'Article',

	'columns' => array(
		'id' =>array(
			'title' => 'id'			
		),
		'title' => array(
			'title' => '标题'
		),
		'scan_num' =>array(
			'title' => '浏览人数'			
		),
		'focus_num' =>array(
			'title' => '收藏人数'			
		),
		'hot_offical' =>array(
			'title' => '0=官方,1=热门,2=双'			
		),
	),

	'edit_fields' => array(
		'title' => array(
			'title' => '标题'
		),
		'scan_num' =>array(
			'title' => '浏览人数'			
		),
		'focus_num' =>array(
			'title' => '收藏人数'			
		),
		'hot_offical' =>array(
			'title' => '内容类型'	,
			'type' => 'enum',
			'options'=>array(
				'0','1','2'
			),			
		),
	),
);	