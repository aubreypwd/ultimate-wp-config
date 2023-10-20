<?php

// You can turn this of by defining LWP_DB_HOST_NO_SOCKET to true.
if ( ! defined( 'LWP_DB_HOST_NO_SOCKET' ) || false === LWP_DB_HOST_NO_SOCKET ) {

	if (

		// Only when using CLI...
		defined( 'WP_CLI' )  && (

			// Not the Site Shell..
			! stristr( shell_exec( 'which wp' ), 'Local.app' ) &&

			// And, No --socket
			! stristr( implode( ' ', $_SERVER['argv'] ?? array() ), '--socket' )
		)
	) {
		die( "Open a Site Shell to use WP CLI, using System wp can be dangerous. Use `define( 'LWP_DB_HOST_NO_SOCKET', true );` in wp-config.php to disable this message.\n" );
	}
}

