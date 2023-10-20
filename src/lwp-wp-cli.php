<?php

// You can turn this of by defining LWP_ALLOW_EXTERNAL_CLI to true.
if ( ! defined( 'LWP_ALLOW_EXTERNAL_CLI' ) || false === LWP_ALLOW_EXTERNAL_CLI ) {

	if (

		// Only when using CLI...
		defined( 'WP_CLI' )  && (

			// Not the Site Shell..
			! stristr( shell_exec( 'which wp' ), 'Local' ) &&

			// And, No --socket...
			! stristr( implode( ' ', $_SERVER['argv'] ?? array() ), '--socket' ) &&

			// No --require (Which LocalWP uses and you are unlikely to)...
			! stristr( implode( ' ', $_SERVER['argv'] ?? array() ), '--require' )
		)
	) {
		die( "Open a Site Shell to use WP CLI, using System wp can be dangerous. Use `define( 'LWP_ALLOW_EXTERNAL_CLI', true );` in wp-config.php to disable this message.\n" );
	}
}

