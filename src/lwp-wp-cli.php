<?php

// Better WP-CLI Support for LocalWP.
if (
	file_exists( __DIR__ . '/../../../../local-xdebuginfo.php' ) && // Only LocalWP puts this here.
	defined( 'WP_CLI' ) &&
	! stristr( DB_HOST, '.sock' ) &&
	(
		! defined( 'LWP_DB_HOST_NO_SOCKET' ) ||
		false === LWP_DB_HOST_NO_SOCKET
	)
) {
	die( "If you are using LocalWP Set `DB_HOST` to the Socket file in the Database tab for this site, or run `wp config set LWP_DB_HOST_NO_SOCKET true --raw` to bypass this message.\n" );
}
