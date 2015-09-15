<?php 

return array(
	'title' => '新品推荐',

	'single' => '新品推荐',

	'model' => 'Poster',

	'columns' => array(
		'photo_url' =>array(
			'title'=>'图片链接'
		),
		'info_url' => array(
			'title'=> '对应礼品id'
		),
		'daily_id' => array(
			'title'=> '是否为新品推荐'
		),
	),

	'edit_fields'=>array(
		'photo_url' =>array(
			'title'=>'图片链接'
		),
		'info_url' => array(
			'title'=> '对应礼品id'
		),
		'daily_id' => array(
			'title'=> '是否为新品推荐',
			'type' => 'enum',
			'options'=>array(
				'1'=>'new',
				'2'=>'daily'
			),
		),
	)
);