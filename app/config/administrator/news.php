<?php

/**
 * Directors model config
 */

return array(

	'title' => 'News',

	'single' => 'News Item',

	'model' => 'News',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'image' => array(
	   		'title' => 'Image',
	   		'output' => '<img src="(:value)" height="100" />',
	   	),
	   	'title' => array(
			'title' => 'Title',
		),
	   	'source' => array(
			'title' => 'source',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'title' => array(
			'title' => 'Title',
		),
		'created_at' => array(
			'title' => 'Created at',
			'type' => 'date',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id' => array(
			'title' => 'ID',
			'type' => 'key',
		),
		'title' => array(
			'title' => 'Title',
			'type' => 'text',
		),
		'image' => array(
			'title' => 'Image',
			'type' => 'text',
		),
		'body' => array(
			'title' => 'Body',
			'type' => 'wysiwyg',
		),
	),

	'form_width' => 800,

);