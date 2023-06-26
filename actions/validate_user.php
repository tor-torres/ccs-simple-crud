<?php 
	if( !empty( $_POST[ 'username' ] ) && !empty( $_POST[ 'password' ] ) ) {
		$username = $_POST[ 'username' ];
		$password = md5($_POST[ 'password' ]);
		$q = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";		
		$check = $DB->query( $q );

		if( $check && $check->num_rows ) {
			$user = $check->fetch_assoc();
			
			$_SESSION[ AUTH_ID ] = $user[ 'id' ];
			$_SESSION[ AUTH_NAME ] = $user[ 'username' ];			
			$_SESSION[ AUTH_TYPE ] = $user[ 'usertype' ];
			set_message( "Welcome back {$user[ 'usertype' ]}!", 'success' );
			redirect();		
		} else {		
			set_message( "Invalid login, please try again." . $DB->error, "danger" );
		}
	} else {		
		set_message( "You must specify the username and password." . $DB->error, "danger" );
	}