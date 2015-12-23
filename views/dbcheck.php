<?php
/**
 * Lrdc Web Framework
 * https://www.cscpro.org/labs/framework/
 *
 * This file will check whether you connected to Database
 * and may tell you need what to do to fix the errors.
 *
 */

if ( ! isset( $db ) ) echo 'You haven\'t set the DB config on lib/config.php';
else echo 'Database connected!';
