<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Groups',

	'single' => 'Group',

	'model' => 'Group',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'name' => array(
	   		'title' => 'Name',
	   	),
		'permissions' => array(
			'title' => 'Permissions',
		),
		'created_at' => array(
			'title' => 'Created at',
		),
		'updated_at' => array(
			'title' => 'Last updated',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Name',
		),
		'permissions' => array(
			'title' => 'Permissions',
		),
		'created_at' => array(
			'title' => 'Created at',
			'type'  => 'date',
		),
		'updated_at' => array(
			'title' => 'Last updated',
			'type'  => 'date',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
		),
		'permissions' => array(
			'title' => 'Permissions',
			'value' => '{"titles.create":1}'
		),
	),

	'form_width' => 500,

	'rules' => array(
    	'name' => 'required',
	),

	'sort' => array(
	    'field' => 'created_at',
	    'direction' => 'desc',
	),

);