<?php

return [
	'item' => [
		'model' => 'Nidesky\Yrbac\Eloquent\AuthItem',
		'table' => 'auth_items',
	],
	'item_child' => [
		'model' => 'Nidesky\Yrbac\Eloquent\AuthItemChild',
		'table' => 'auth_item_child'
	],
	'assignment' => [
		'model' => 'Nidesky\Yrbac\Eloquent\Assignment',
		'table' => 'auth_assignments'
	]
];