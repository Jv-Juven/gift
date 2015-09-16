<?php

return array(
	'title' => '话题标题',

	'single' => '话题标题',

	'model' => 'Article',

	'columns' => array(
		'id' =>array(
			'title' => 'id'			
		),
		'title' =>array(
			'title' => '话题标题'			
		),
		'scan_num' => array(
			'title' => '浏览人数'
		),
		'join_num' =>array(
			'title' => '参与话题人数'			
		),
		'focus_num' => array(
			'title' => '收藏人数'
		),
		'hot_article' => array(
			'title' => '0=官方,1=热门'
		)

	),

	'edit_fields' => array(
		'title' =>array(
			'title' => '话题标题'			
		),
		'scan_num' => array(
			'title' => '浏览人数'
		),
		'join_num' =>array(
			'title' => '参与话题人数'			
		),
		'focus_num' => array(
			'title' => '收藏人数'
		),
		'hot_article' => array(
			'title' => '0=官方,1=热门',
			'type'	=>'enum',
			'options'=>array(
				'0','1'
			) 
		)
	),
);	