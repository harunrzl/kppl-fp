<?php
/**
 * Lrdc Web Framework
 * https://www.cscpro.org/labs/framework/
 *
 * This is the Authorization page.
 * Here you can control how you differentiate between users.
 *
 */


/* Uncomment these line to enable auth
 * and modify it to suit your needs
 */
if ( $_SESSION['login_client'] ) {
    $loggedin = true;
    $me = $db->f( 'users', '*', 'WHERE id=?', $_SESSION['login_client'] );
	if ( $me->session_value && $me->session_time < time() ) {
		$db->u( 'users', 'SET session_value=0 WHERE id=?', $me->id );
		unset( $loggedin, $me );
		session_destroy();
	}
}