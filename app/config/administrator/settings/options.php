<?php

return array(

    /**
     * Settings page title
     *
     * @type string
     */
    'title' => 'Options',

    /**
     * The edit fields array
     *
     * @type array
     */
    'edit_fields' => array(
        'data_provider' => array(
            'type' => 'enum',
            'title' => 'Primary Data Provider',
            'options' => array('tmdb', 'imdb', 'db'),
        ),
        'search_provider' => array(
            'type' => 'enum',
            'title' => 'Primary Search Provider',
            'options' => array('tmdb', 'imdb', 'db'),
        ),
        'tmdb_api_key' => array(
            'title' => 'TMDB api key',
            'type' => 'text',
            'limit' => 255,
        ),
        'disqus_short_name' => array(
            'title' => 'Disqus Shortname',
            'type' => 'text',
            'limit' => 255,
        ),
        'contact_us_email' => array(
            'title' => 'Contact us email',
            'type' => 'text',
            'limit' => 255,
        ),
        'fb_url' => array(
            'title' => 'Your site facebook url',
            'type' => 'text',
            'limit' => 255,
        ),
        'amazon_id' => array(
            'title' => 'Amazon affiliate id',
            'type' => 'text',
            'limit' => 255,
        ),
        'tmdb_language' => array(
            'title' => 'TMDB language',
            'type' => 'text',
            'limit' => 255,
        ),
        'uri_separator' => array(
            'title' => 'Url separator',
            'type' => 'text',
            'limit' => 1,
        ),
        'uri_case' => array(
            'title' => 'Uri first letter case',
            'type' => 'enum',
            'options' => array('lowercase', 'uppercase'),
        ),
        'save_tmdb' => array(
            'title' => 'Save images from TMDb locally?',
            'type' => 'bool',
        ),
        'scrape_news_fully' => array(
            'title' => 'Scrape news fully?',
            'type' => 'bool',
        ),
        'require_act' => array(
            'title' => 'Require users to activate account via email?',
            'type' => 'bool',
        ),
        'use_cache' => array(
            'title' => 'Enable caching in filesystem?',
            'type' => 'bool',
        ),
        'auto_upd_data' => array(
            'title' => 'Automaticlly update data?',
            'type' => 'bool',
        ),

    ),

    'rules' => array(
        'tmdb_api_key' => 'max:255',
        'contact_us_email' => 'email|max:100',
        'uri_separator' => 'max:1',
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