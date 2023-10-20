<?php

if ( ! defined( 'LOCALWP' ) || false === LOCALWP ) {
	return; // You have to tell us if you're using Local.
}

if ( ! defined( 'WP_CLI' ) ) {
	return; // This only matters when something is using WP CLI.
}

if ( stristr( defined( 'DB_HOST' ) ? DB_HOST : '', '.sock' ) ) {
	return; // If you are using a socket file, we're going to trust you.
}

// You can turn this of by defining LOCALWP_ALLOW_EXTERNAL_CLI to true.
if ( defined( 'LOCALWP_ALLOW_EXTERNAL_CLI' ) && true === LOCALWP_ALLOW_EXTERNAL_CLI ) {
	return; // You don't want this message to show.
}

if (

	// Using --require (which LocalWP UI does, but you are unlikely to do).
	stristr( implode( ' ', $_SERVER['argv'] ?? array() ), '--require' )
) {
	return; // Any of these are allowed to run wp-cli.
}

$sockfile = basename( dirname( realpath( __DIR__ . '/../../../../../' ) ) );

// You probably should be using WP CLI in a Site Shell.
die( "WP CLI w/out using a Socket File in LocalWP can be dangerous (and sometimes not work at all). We suggest you create `app/public/{$sockfile}.sock` with the contents of Local > Site > Database > Socket to use WP CLI safely. Use `define( 'LOCALWP_ALLOW_EXTERNAL_CLI', true );` in wp-config.php to disable this message.\n" );
