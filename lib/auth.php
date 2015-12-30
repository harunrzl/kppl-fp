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
}
else {
	//$f = $db->f( 'client', '*', 'WHERE user_client=?', $_SESSION['login_username']);
}