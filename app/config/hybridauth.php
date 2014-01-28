<?php
return array(	
	"base_url"   => url() . '/social/auth',
	"providers"  => array (
		"Google"     => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "**************", "secret" => "**************" ),
			"scope"      => "https://www.googleapis.com/auth/userinfo.profile ".
                            "https://www.googleapis.com/auth/userinfo.email"   ,
			),
		"Facebook"   => array (
			"enabled"    => true,
			"keys"       => array ( "id" => "184864731723977", "secret" => "ef8fb5ab42c859dcd7a76e287da1d177" ),
			'scope'      =>  'email',
			),
		"Twitter"    => array (
			"enabled"    => true,
			"keys"       => array ( "key" => "2WWttH0EO5U4Sx1Gz0FuAw", "secret" => "JkXgCAw6iNqvOoRzpVlGWhwRJ5DpWeY9qzYeXfcUM" )
			)
	),
);