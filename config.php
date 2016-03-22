<?php

// You can override any configuration entry defined in vendor/mrvito/microcore-framework/config.php

return array(

	/*
	 * Main application settings
	 */
	'app' => array(
		'debug' => true,
		'domain' => '//domain.com',
	),

	/**
	 * Various default application paths
	 */
	'paths' => array(
		'views' => 'app/views/',
		'assets' => 'public/'
	),

	/*
	 * Database settings for MySQL database
	 */
	'database' => array(
		'connect' =>    true,
		'host' =>       'localhost',
		'database' =>   'blackbook',
		'user' =>       'blackbook',
		'password' =>   'blackbook'
	)
);