<?php
/**
 * Lrdc Framework
 * Copyright (C) 2015 Cscpro Labs
 * https://www.cscpro.org/labs/framework/
 *
 * Contains most used function of this framework.
 * TODO: Write how-to on each function *
 *
 */


/* "x" time ago */
function ezDate( $d ) {
	$ts = time() - $d;
	if ( $ts>31536000 ) $val = round( $ts/31536000, 0 ) . ' year';
	elseif ( $ts>2419200 ) $val = round( $ts/2419200, 0 ) . ' month';
	elseif ( $ts>604800 ) $val = round( $ts/604800, 0 ) . ' week';
	elseif ( $ts>86400 ) $val = round( $ts/86400, 0 ) . ' day';
	elseif ( $ts>3600 ) $val = round( $ts/3600, 0 ) . ' hour';
	elseif ( $ts>60 ) $val = round( $ts/60, 0 ) . ' minute';
	else $val = $ts . ' second';
	if ( $val>1 ) $val .= 's';
	return $val;
}


/* Escape string to html entity */
function escape( $str ) {
	$r = htmlentities( stripslashes( $str ), ENT_QUOTES );
	return $r;
}


/* Convert all string into url */
function slugify( $t, $i=true ) {
	$t = preg_replace( '/\W+/', '-', $t );
	if ( $i ) $t = strtolower( trim( $t, '-' ) );
	return $t;
}


/* Json Parser */
function apiJson( $u ) {
	return json_decode( file_get_contents( $u ) );
}


/* Explode html */
function xp( $p, $t, $j=1, $o=null ) {
	global $bc;
	if ( $o==null ) $o = $bc;
	if ( ! is_numeric( $j ) ) {
		$o=$j;
		$j=1;
	}
	$xp = explode( $p, $o );
	$r = explode( $t, $xp[$j] );
	return $r[0];
}


/* Convert all string into integrer */
function toint( $i ) {
	return preg_replace( "/[^0-9]/","", $i );
}


/* Get a random string */
function randstr( $opt, $str=null ) {
	$alpha = 'abcdefghijkmnopqrstuwxyzABCDEFGHJKLMNOPQRSTUWXYZ0123456789';
	$passw = 'abcdefghijkmnopqrstuwxyzABCDEFGHJKLMNOPQRSTUWXYZ0123456789!@#$%^&*()_+-=';
	$str = ( $str == 'passw' ) ? $passw : $alpha;
	for ( $i = 0; $i < $opt; $i++ ) {
		$n = rand( 0, strlen( $str ) - 1 );
		$r[$i] = $str[$n];
	}
	return implode( $r );
}


/* Get the last value of explode */
function endexplode( $s, $i ) {
	$o = explode( $s, $i );
	return end( $o );
}


/* Useful for relative url path */
function redirect( $i=null ) {
	global $_csc;
	$r = $i == null ? '' : $_csc->dirpath() . ltrim( $i, '/' );
	header( 'Location: ' . $r );
}
