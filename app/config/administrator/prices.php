<?php

return array(
	'title' => '价格',

	'single' => '价格',

	'model' => 'Price',

	'columns' => array(
		'id' =>array(
			'title' => 'id'			
		),
		// 'price_id' =>array(
		// 	'title' => '性格分类'			
		// ),
		'low_price' => array(
			'title' => '低价'
		),
		'high_price' => array(
			'title' => '高价'
		),
	),

	'edit_fields' => array(
		'low_price' => array(
			'title' => '低价'
		),
		'high_price' => array(
			'title' => '高价'
		),
	),
);	
