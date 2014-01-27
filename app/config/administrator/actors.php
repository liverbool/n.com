<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Actors',

	'single' => 'actor',

	'model' => 'Actor',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'image' => array(
	   		'title' => 'Image',
	   		'output' => '<img src="(:value)" height="100" />',
	   	),
		'name' => array(
			'title' => 'Name',
		),
		'num_films' => array(
			'title' => '# titles',
			'relationship' => 'title',
			'select' => 'COUNT((:table).id)',
		),
		'birth_date' => array(
			'title' => 'Birth Date',
			'sort_field' => 'birth_date',
		),
		'views' => array(
			'title' => 'Views',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'name' => array(
			'title' => 'Name',
			'type' => 'text'
		),
		'title' => array(
			'title' => 'Movies & Series',
			'type' => 'relationship',
			'name_field' => 'title',
			'autocomplete' => true,
		),
		'birth_date' => array(
			'title' => 'Birth Date',
			'type' => 'date'
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'name' => array(
			'title' => 'Name',
			'type' => 'text',
		),
		'bio' => array(
			'title' => 'Biography',
			'type' => 'text',
		),
		'awards' => array(
			'title' => 'Awards',
			'type' => 'text',
		),
		'birth_place' => array(
			'title' => 'Birth Place',
			'type' => 'text',
		),
		'birth_date' => array(
			'title' => 'Birth Date',
			'type' => 'date',
		),
		'title' => array(
			'title' => 'Movies & Series',
			'type' => 'relationship',
			'name_field' => 'title',
			'autocomplete' => true,
		),
		'allow_update' => array(
			'title' => 'allow_update',
			'value' => 0,
		),
	),

	'form_width' => 500,

	'rules' => array(
    	'name' => 'required',
	),

	'sort' => array(
	    'field' => 'num_films',
	    'direction' => 'desc',
	),

);