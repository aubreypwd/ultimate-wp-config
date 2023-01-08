<?php

// Multisite.
if ( defined( 'WP_ALLOW_MULTISITE' ) && true === WP_ALLOW_MULTISITE ) {

	/**
	 * Live links will be supported, but we can't automatically
	 * re-direct that for you.
	 */

	$base = '/';

	@define( 'MULTISITE', true );
	@define( 'SUBDOMAIN_INSTALL', false );
	@define( 'DOMAIN_CURRENT_SITE', defined( 'HOST' ) ? HOST : 'localhost' ); // This has to match what's in the DB.
	@define( 'PATH_CURRENT_SITE', $base );
	@define( 'SITE_ID_CURRENT_SITE', 1 );
	@define( 'BLOG_ID_CURRENT_SITE', 1 );

// Single Site.
} else {

	// Publically (using Live Links in LocalWP).
	if (
		defined( 'LWP_LIVE' ) && true === LWP_LIVE && // $> wp config set live true --raw
		defined( 'LWP_LIVE_USERNAME' ) &&
		defined( 'LWP_LIVE_PASSWORD' ) &&
		defined( 'LWP_LIVE_HOST' )
	) {

		$un   = LWP_LIVE_USERNAME;
		$pass = LWP_LIVE_PASSWORD;
		$host = LWP_LIVE_HOST;

		// When using LocalWP live link.
		@define( 'WP_HOME', "https://{$un}:{$pass}@{$host}" ); // Updated on Oct 25, 2022
		@define( 'WP_SITEURL', WP_HOME );

		unset( $un, $pass, $host );

	// Locally.
	} else {

		$host = defined( 'HOST' ) ? HOST : '';

		// You are overriding just the host.
		if ( ! empty( $host ) ) {

			// Force the URL we want (rather than what's in the DB).
			@define( 'WP_HOME', "https://{$host}" );
			@define( 'WP_SITEURL', WP_HOME );

			// Force live links to go local.
			$_SERVER['HTTP_HOST'] = $host;
			$_SERVER['HTTP_X_ORIGINAL_HOST'] = $host;
			$_SERVER['HTTP_X_FORWARDED_HOST'] = $host;
		}

		unset( $host );
	}
}