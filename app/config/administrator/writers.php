<?php

/**
 * Directors model config
 */

return array(

	'title' => 'Writers',

	'single' => 'writer',

	'model' => 'Writer',

	/**
	 * The display columns
	 */
	'columns' => array(
		'name' => array(
			'title' => 'Name',
		),
		'num_films' => array(
			'title' => '# Movies',
			'relation' => 'title',
			'select' => 'COUNT((:table).id)',
		),
		'title' => array(
			'title' => 'Movies & Series',
			'type' => 'relationship',
			'name_field' => 'title',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name',
		'title' => array(
			'title' => 'Movies & Series',
			'type' => 'relationship',
			'name_field' => 'title',
			'autocomplete' => true,
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
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'title' => array(
			'title' => 'Movies & Series',
			'type' => 'relationship',
			'name_field' => 'title',
			'autocomplete' => true,
		),
	),

);