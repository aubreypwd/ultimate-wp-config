<?php

// Disabled by default, use define( 'MAIL', true ); to enable.
if ( ! defined( 'MAIL' ) || false === MAIL ) {

	// Don't send mail by default.
	function wp_mail() {
		return true;
	}
}