<?php
/**
 * Lrdc Web Framework
 * Copyright (C) 2015 Cscpro Labs
 * https://www.cscpro.org/labs/framework/
 *
 * Set these variables to suit your needs
 * or just leave it if you don't know what to do
 *
 */

/* Reporting error but not the variable */
error_reporting( E_ALL & ~E_NOTICE );

/* Default timezone */
date_default_timezone_set( 'Asia/Jakarta' );


/* Basepath
 * Uncomment these line if your basepath not in domain root
 * for example your site located on localhost/lrdc-fw/
 * then you need to set basepath to "lrdc-fw"
 * so you need to add: $_config['basepath'] = 'lrdc-fw';
 */
//$_config['basepath'] = '';


/* Database config*/
$_db = new stdClass;
$_db->name = 'kppl'; // YOUR DB name HERE
$_db->user = 'root'; // YOUR DB username HERE
$_db->pass = ''; // YOUR DB password HERE
