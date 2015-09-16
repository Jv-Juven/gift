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
			'title'=> '0=新品推荐,1=每日一荐'
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
			'title'=> '0=新品推荐,1=每日一荐',
			'type' => 'enum',
			'options'=>array(
				'0' , '1' 
			),
		),
	)
);