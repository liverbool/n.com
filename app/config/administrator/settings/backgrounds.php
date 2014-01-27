<?php

return array(

	/**
	 * Settings page title
	 *
	 * @type string
	 */
	'title' => 'Backgrounds',

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'home_bg' => array(
			'title' => 'Home page background',
			'type' => 'text',
		),
		'login_bg' => array(
			'title' => 'Login page background',
			'type' => 'text',
		),
		'register_bg' => array(
			'title' => 'Register page background',
			'type' => 'text',
		),
		'404_bg' => array(
			'title' => '404 page background',
			'type' => 'text',
		),
	),

	'rules' => array(
		'home_bg' => 'required|max:255',
		'404_bg' => 'required|max:255',
		'register_bg' => 'required|max:255',
		'login_bg' => 'required|max:255',
	),

	/**
	 * This is run prior to saving the JSON form data
	 *
	 * @type function
	 * @param array		$data
	 *
	 * @return string (on error) / void (otherwise)
	 */
	'before_save' => function(&$data)
	{
		$dash = \App::make('Lib\Repository\Dashboard\DashboardRepositoryInterface');
		$dash->updateOptions($data);
	},

	/**
	 * The permission option is an authentication check that lets you define a closure that should return true if the current user
	 * is allowed to view this settings page. Any "falsey" response will result in a 404.
	 *
	 * @type closure
	 */
	'permission'=> function()
	{
		return true;
		//return Auth::user()->hasRole('developer');
	},

);