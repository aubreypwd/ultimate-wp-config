<?php

if ( ! defined( 'LOCALWP' ) || false === LOCALWP ) {
	return; // You have to tell us if you're using Local.
}

if ( ! defined( 'WP_CLI' ) ) {
	return; // Only matters when you are using WP CLI.
}

$sitedir = basename( dirname( realpath( __DIR__ . '/../../../../../' ) ) );;
$sockfile = __DIR__ . "/../../../../../../../{$sitedir}/app/public/{$sitedir}.sock";

if ( ! file_exists( $sockfile ) ) {
	return; // You don't have a .sock file configured, don't use a Socket File (this make cause issues later).
}

if ( 	stristr( implode( ' ', $_SERVER['argv'] ?? array() ), '--require' ) ) {
	return; // LocaLOCALWP UI does --require (you likely won't) so let this through so it can do it's thing.
}

// Note, in PHP 8 this won't work, you will need to load autoload.php before DN_HOST is defined.wewp
define( 'DB_HOST', 'localhost:' . trim( file_get_contents( $sockfile ) ) );

// Make sure nothing else stops wp-cli.
define( 'LOCALWP_ALLOW_EXTERNAL_CLI', true );

unset( $sitedir, $sockfile );
