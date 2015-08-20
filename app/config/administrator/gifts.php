<?php

return array(

	'title' => '礼品 ',

	'single' => '礼品',

	'model' => 'Gift',

	'columns' => array(
		'id' => array(
			'title'=> '礼品ID'
		),
		'topic_id' =>array(
			'title' => '话题ID'
		),
		'title' => array(
			'title' => '礼物名称'
		),
		'price' => array(
			'title' => '礼物价格'
		),
		'content' => array(
			'title' => '礼品描述'
		),
		'gift_photo_intro' => array(
 			'title' => '图文描述',
 		),
		'scan_num' =>array(
			'title'=> '浏览人数'
		),
		'focus_num' =>array(
			'title' => '收藏人数'
		),
		'scene_id' => array(
			'title' => '场景分类'
		),
		'object_id' => array(
			'title' => '对象分类'
		),
		'char_id' => array(
			'title'=> '性格分类'
		),
		'taobao_url' =>array(
			'title'=> '淘宝链接'
		),
	),

	'edit_fields' => array(
		'topic_id' =>array(
			'title' => '话题id'
		),
		'title' => array(
			'title' => '礼物名称'
		),
		'price' => array(
			'title' => '礼物价格'
		),
		'content' => array(
			'title' => '礼品描述',
			'type' => 'textarea'
 		),
 		'gift_photo_intro' => array(
 			'title' => '图文描述',
 			'type'=>'wysiwyg'
 		),
		'scan_num' =>array(
			'title'=> '浏览人数'
		),
		'focus_num' =>array(
			'title' => '收藏人数'
		),
		'scene_id' => array(
			'title' => '场景分类'
		),
		'object_id' => array(
			'title' => '对象分类'
		),
		'char_id' => array(
			'title'=> '性格分类'
		),
		'taobao_url' =>array(
			'title'=> '淘宝链接'
		),
	)

);