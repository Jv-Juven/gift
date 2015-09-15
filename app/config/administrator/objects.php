<?php

return array(
	'title' => '对象',

	'single' => '对象',

	'model' => 'Object',

	'columns' => array(
		'id' =>array(
			'title' => 'id'			
		),
		'scene_id' =>array(
			'title' => '性格分类'			
		),
		'_class' => array(
			'title' => '性格名称'
		),
	),

	'edit_fields' => array(
		'scene_id' =>array(
			'title' => '性格分类'			
		),
		'_class' => array(
			'title' => '性格名称'
		),
	),
);	



$table->increments('id');
			$table->integer('object_id');//对象编号
			$table->string('_class');//类名
			$table->timestamps();
对象