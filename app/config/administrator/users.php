<?php

/**
 * Actors model config
 */

return array(

	'title' => 'Users',

	'single' => 'User',

	'model' => 'User',

	/**
	 * The display columns
	 */
	'columns' => array(
		'id',
		'avatar' => array(
	   		'title' => 'Avatar',
	   		'output' => '<img src="(:value)"/>',
	   	),
		'username' => array(
			'title' => 'Username',
		),
		'email' => array(
			'title' => 'Email',
		),
		'gender' => array(
			'title' => 'Gender',
		),
		'created_at' => array(
			'title' => 'Registered',
		),
	),

	/**
	 * The filter set
	 */
	'filters' => array(
		'id',
		'username' => array(
			'title' => 'Username',
		),
		'email' => array(
			'title' => 'Email',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'username' => array(
			'title' => 'Username',
		),
		'email' => array(
			'title' => 'Email',
		),
		'password' => array(
			'title' => 'Password',
			'type' => 'password',
		),
		'group' => array(
			'title' => 'Group',
			'type' => 'relationship',
			'name_field' => 'name',
		),
		'avatar' => array(
			'title' => 'Avatar',
		),
		'first_name' => array(
			'title' => 'First Name',
		),
		'last_name' => array(
			'title' => 'Last Name',
		),
		'activated' => array(
			'title' => 'Activated',
			'type'  => 'bool',
		),
		'permissions' => array(
			'title' => 'Permissions',
		),
	),

	'form_width' => 500,

	'rules' => array(
    	'username' => 'required',
    	'password' => 'required|min:5',
    	'email'    => 'required|email|min:5,max:25',
	),

	'sort' => array(
	    'field' => 'created_at',
	    'direction' => 'desc',
	),

);