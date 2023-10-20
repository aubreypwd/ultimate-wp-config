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

	// Publicly (using Live Links in LocalWP).
	if (
		defined( 'LOCALWP_LIVE' ) && true === LOCALWP_LIVE && // $> wp config set live true --raw
		defined( 'LOCALWP_LIVE_USERNAME' ) &&
		defined( 'LOCALWP_LIVE_PASSWORD' ) &&
		defined( 'LOCALWP_LIVE_HOST' )
	) {

		$un   = LOCALWP_LIVE_USERNAME;
		$pass = LOCALWP_LIVE_PASSWORD;
		$host = LOCALWP_LIVE_HOST;

		$protocol = defined( 'PROTOCOL' ) ? PROTOCOL : 'http';

		// When using LocalWP live link.
		@define( 'WP_HOME', "{$protocol}://{$un}:{$pass}@{$host}" ); // Updated on Oct 25, 2022
		@define( 'WP_SITEURL', WP_HOME );

		unset( $un, $pass, $host, $protocol );

	// Locally.
	} else {

		$host     = defined( 'HOST' ) ? HOST : '';
		$protocol = defined( 'PROTOCOL' ) ? PROTOCOL : 'http';

		// You are overriding just the host.
		if ( ! empty( $host ) ) {

			// Force the URL we want (rather than what's in the DB).
			@define( 'WP_HOME', "{$protocol}://{$host}" );
			@define( 'WP_SITEURL', WP_HOME );

			// Force live links to go local.
			$_SERVER['HTTP_HOST'] = $host;
			$_SERVER['HTTP_X_ORIGINAL_HOST'] = $host;
			$_SERVER['HTTP_X_FORWARDED_HOST'] = $host;
		}

		unset( $host, $protocol );
	}
}
