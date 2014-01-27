<?php

return array(

	/**
	 * Settings page title
	 *
	 * @type string
	 */
	'title' => 'Ads',

	/**
	 * The edit fields array
	 *
	 * @type array
	 */
	'edit_fields' => array(
		'ad_footer_all' => array(
			'title' => 'This will appear at the bottom of most pages',
			'type' => 'text',
		),
		'ad_home_news' => array(
			'title' => 'This will appear between news on the homepage',
			'type' => 'text',
		),
		'ad_home_jumbo' => array(
			'title' => 'This will appear under the slider on the homepage',
			'type' => 'text',
		),
		'ad_title_jumbo' => array(
			'title' => 'This will appear under the header on the title page',
			'type' => 'text',
		),
		'ad_title_critic' => array(
			'title' => 'This will appear between the critic reviews on title page',
			'type' => 'text',
		),
		'ad_title_user' => array(
			'title' => 'This will appear between the user reviews on title page',
			'type' => 'text',
		)
	),

	'rules' => array(
		'add_footer_all' => 'max:1000',
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