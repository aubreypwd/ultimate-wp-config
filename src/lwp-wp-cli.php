<?php

if ( ! defined( 'DB_HOST_NO_SOCKET' ) ) {
	return;
}

// Better WP-CLI Support for LocalWP.
if (
	file_exists( __DIR__ . '/../../../../local-phpinfo.php' ) && // Only LocalWP puts this here.
	defined( 'WP_CLI' ) &&
	! stristr( DB_HOST, '.sock' ) &&
	(
		! defined( 'DB_HOST_NO_SOCKET' ) ||
		false === DB_HOST_NO_SOCKET
	)
) {
	die( "Run [wp config set DB_HOST 'localhost:/path/to/socket.sock'] from DB tab in LocalWP to setup a better DB connection for WP-CLI and try again or run [wp config set DB_HOST_NO_SOCKET true --raw] to bypass.\n" );
}