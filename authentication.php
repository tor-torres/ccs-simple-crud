<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' );

	// table columns found in your 'users' table
	define( 'AUTH_ID', 'id' );
	define( 'AUTH_NAME', 'username' );
	define( 'AUTH_TYPE', 'usertype' );

	// default page to login, name of the file found in /pages
	define( 'LOGIN_REDIRECT', 'login' ); 

	$restricted_pages[ 'admin' ]['access'] = [ "staff", "admin-page", "dashboard", "default", "feedback", "view-feedback", "image-carousel", "services", "update-image-carousel", "update-service", "update-staff", "settings"];
	$restricted_pages[ 'admin' ][ 'default_page' ] = "dashboard";

	$restricted_pages[ 'default' ]['access'] = [ "default", "login"];
	$restricted_pages[ 'default' ][ 'default_page' ] = "default"; 

	has_access( true );
