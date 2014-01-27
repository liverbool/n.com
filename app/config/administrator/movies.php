<?php

return array(

	'title'  => 'Movies',
	'single' => 'Movie',
	'model'  => 'Title',

	'link' => function($model)
	{
    	return Helpers::url($model->title, $model->id, 'movies');
	},

	'columns' => array(
	   'id',   
	   'poster' => array(
	   		'title' => 'Poster',
	   		 'output' => '<img src="(:value)" height="100" />',
	   		),

	   'title',
	   'genre',

	   Helpers::getProvider() . '_rating',

	   'year',
	   'created_at',
	),

	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
		),
		'type' => array(
		    'type' => 'enum',
		    'title' => 'Type',
		    'options' => array('movie', 'series'),
		),
		'actor' => array(
		    'type' => 'relationship',
		    'title' => 'Actor',
		    'name_field' => 'name',
		    'autocomplete' => true,
		),
		'director' => array(
		    'type' => 'relationship',
		    'title' => 'Director',
		    'name_field' => 'name',
		    'autocomplete' => true,
		),
		'writer' => array(
		    'type' => 'relationship',
		    'title' => 'Writer',
		    'name_field' => 'name',
		    'autocomplete' => true,
		),
		'featured' => array(
	    	'type' => 'bool',
	    	'title' => 'Featured',
		),
		'now_playing' => array(
	    	'type' => 'bool',
	    	'title' => 'Now playing in theaters',
		),

		'release_date' => array(
			'title' => 'Release Date',
		),

		'custom_field' => array(
    		'type' => 'textarea',
    		'limit' => 255,
    		'title' => 'Custom Content',
		),

		'plot' => array(
			'title' => 'Plot',
			'type' => 'markdown',
    		'limit' => 1000,
    		'height' => 130,
		),

		'tagline' => array(
			'title' => 'Tagline',
		),

		'genre' => array(
			'title' => 'Genre',
		),

		'affiliate_link' => array(
			'title' => 'Affiliate Link',
		),

		'poster' => array(
		    'title' => 'Poster',
		    'type' => 'image',
		    'location' => public_path() . '/imdb/posters/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 5,
		    'sizes' => array(
        		array(428, 634, 'crop', public_path() . '/imdb/posters/', 100)
    		)
		),

		'trailer' => array(
			'title' => 'Trailer',
		),

		'awards' => array(
			'title' => 'Awards',
		),

		'runtime' => array(
			'title' => 'Runtime',
		),

		'budget' => array(
			'title' => 'Budget',
		),

		'revenue' => array(
			'title' => 'Revenue',
		),
		'year' => array(
			'title' => 'Year',
		),
		'imdb_id' => array(
			'title' => 'IMDb ID',
		),
		'tmdb_id' => array(
			'title' => 'TMDB ID',
		),
		'allow_update' => array(
			'title' => 'allow_update',
			'value' => 0,
		),
	),

	'filters' => array(
	    'title' => array(
	        'title' => 'Title',
	    ),
	    'language' => array(
	        'title' => 'Language',
	    ),
	    'country' => array(
	        'title' => 'Country',
	    ),
	    'release_date' => array(
	        'title' => 'Release Date',
	        'type' => 'date',
	    ),
	    'actor' => array(
		    'type' => 'relationship',
		    'title' => 'Actor',
		    'name_field' => 'name',
		    'autocomplete' => true,
		),
		'director' => array(
		    'type' => 'relationship',
		    'title' => 'Director',
		    'name_field' => 'name',
		    'autocomplete' => true,
		),
		'writer' => array(
		    'type' => 'relationship',
		    'title' => 'Writer',
		    'name_field' => 'name',
		    'autocomplete' => true,
		),
	    'mc_user_score' => array(
	    	'title' => 'Metacritic User Score',
	    	'type' => 'number'
	    ),
	    'mc_critic_score' => array(
	    	'title' => 'Metacritic Critic Score',
	    	'type' => 'number'
	    ),
	    'created_at' => array(
	    	'title' => 'Created at',
	    	'type' => 'date'
	    ),

	),

	'sort' => array(
	    'field' => Helpers::getOrdering(),
	    'direction' => 'desc',
	),

	'query_filter'=> function($query)
	{

	    $query->whereType('movie');
	},

	'form_width' => 1000,

	'rules' => array(
    	'title' => 'required',
    	'year' => 'required|min:4,max:4|numeric',
    	'type'  => 'required|in:movie,series',
    	'allow_update' => 'required|in:1,0',
	),

	'actions' => array(
    'update_from_external' => array(
        'title' => 'Update From External',
        'messages' => array(
            'active' => 'Updating...',
            'success' => 'Updated Successfuly.',
            'error' => 'There was an error.',
        ),
        'action' => function($model)
        {
            $model->updateFromExternal();

            return true;
        }
    )),
);