<?php

return array(

	/**
	 * Settings page title
	 *
	 * @type string
	 */
	'title' => 'Appearance',

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'color_scheme' => array(
			'title' => 'Color Scheme',
			'type' => 'enum',
			'options' => array('red', 'green', 'blue', 'asbestos', 'purple', 'navy', 'beach', 'rust'),
		),
		'success_color' => array(
			'title' => 'Success Color',
			'type' => 'color',
		),
		'warning_color' => array(
			'title' => 'Warning Color',
			'type' => 'color',
		),
		'danger_color' => array(
			'title' => 'Danger Color',
			'type' => 'color',
		),
		'home_view' => array(
		    'type' => 'enum',
		    'title' => 'Home Page View',
		    'options' => array('columns', 'rows'),
		),
		'title_view' => array(
		    'type' => 'enum',
		    'title' => 'Title Page View',
		    'options' => array('tabs', 'noTabs'),
		),
		'news_ex_len' => array(
			'title' => 'News Excerpt Lenght',
			'type' => 'text',
		),
	),

	'rules' => array(
		'news_ex_len' => 'required|numeric'
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