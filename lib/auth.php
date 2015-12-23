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
if ( $_SESSION['user_id'] ) {
    $loggedin = true;
    $me = $_SESSION['user_id'];
}