<?php

// Set define( 'DISABLE_JETPACK_PROTECTION', true ) to bypass these.

if (
	! defined( 'DISABLE_JETPACK_PROTECTION' ) ||
	true !== DISABLE_JETPACK_PROTECTION
) {

	// These should keep Jetpack from connecting to wordpress.com.
	define( 'JETPACK_DEV_DEBUG', true );
	define( 'WP_ENVIRONMENT_TYPE', 'development' );
	define( 'WP_LOCAL_DEV', true );
}
