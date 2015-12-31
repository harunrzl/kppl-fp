<?php
/**
 * Lrdc Web Framework
 * Copyright (C) 2015 Cscpro Labs
 * https://www.cscpro.org/labs/framework/
 *
 * This is the Controller page.
 * You can do anything you want here.
 *
 */

if ( $_csc->uri[1] == 'csc' ) {
	chdir( 'csc' );
	include( 'index.php' );
}

elseif ( file_exists( 'views/' . $_csc->uri[1] . '.php' ) ) include( 'views/' . $_csc->uri[1] . '.php' );

else echo '404';
