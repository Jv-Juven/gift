<?php

return array(

	'title' => '礼品专题',

	'single' => '礼品专题',

	'model' => 'Topic',

	'columns' => array(
		'id' => array(
			'title' => '话题ID'
		),
		'title' => array(
			'title' => '话题题目'
		),
		'content' => array(
			'title' => '话题内容'
		),
		'topic_url' => array(
			'title' => '话题图片链接'
		),
		'scan_num' => array(
			'title' => '浏览人数'
		),
		'join_num' => array(
			'title' => '参与话题人数'
		),
		'focus_num' => array(
			'title' => '收藏人数'
		),
	), 

	'edit_fields' =>array(
		'title' => array(
			'title' => '话题题目'
		),
		'content' => array(
			'title' => '话题内容',
			'type' => 'textarea'
		),
		'topic_url' => array(
			'title' => '话题图片链接'
		),
		'scan_num' => array(
			'title' => '浏览人数'
		),
		'join_num' => array(
			'title' => '参与话题人数'
		),
		'focus_num' => array(
			'title' => '收藏人数'
		),
	),
);