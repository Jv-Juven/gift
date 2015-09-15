<?php


$table->increments('id');
$table->integer('price_id')->unsigned()->index('price_id');
$table->string('low_price');
$table->string('high_price');
$table->timestamps();
价格