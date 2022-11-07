<?php

// AffiliateWP License Keys.
if (
	defined( 'AFFWP_LICENSE' ) &&
	(

		// Set these to your keys.
		defined( 'AFFWP_LICENSE_PRO' ) ||
		defined( 'AFFWP_LICENSE_PERSONAL' )
	)
) {

	// Set AFFWP_LICENSE to pro or personal easily.
	switch ( AFFWP_LICENSE ) {
		case 'pro':  define( 'AFFILIATEWP_LICENSE_KEY', @defined( 'AFFWP_LICENSE_PRO' ) ? AFFWP_LICENSE_PRO : '' ); break;
		case 'personal': define( 'AFFILIATEWP_LICENSE_KEY', @defined( 'AFFWP_LICENSE_PERSONAL' ) ? AFFWP_LICENSE_PERSONAL : '' ); break;
	}
}