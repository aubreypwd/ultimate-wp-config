<?php

// Disabled by default, use define( 'MAIL', true ); to enable.
if ( defined( 'MAIL' ) && true === MAIL ) {
	return; // They want mail on.
}

// Don't send mail by default.
function wp_mail() {
	return true;
}