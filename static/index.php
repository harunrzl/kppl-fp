<?php
/**
 * Lrdc Web Framework
 * Copyright (C) 2015 Cscpro Labs
 * https://www.cscpro.org/labs/framework/
 *
 * This page controlled the static pages,
 * somehow it's not really a static page.
 *
 */

header("Pragma: cache");
header( "Cache-Control: public, max-age=604800" );

$syntax = implode( '/', $_csc->uri );
$files = 'static' . str_replace( '%20', ' ', $syntax ) . '.' . $_csc->format;

// Functions
function pfx($t,$i) {
	$r = $i . ':\\1;';
	$t = 'x' . $t;
	if ( strpos( $t, 'm' ) ) $r .= '-moz-' . $i . ':\\1;';
	if ( strpos( $t, 'w' ) ) $r .= '-webkit-' . $i . ':\\1;';
	if ( strpos( $t, 'o' ) ) $r .= '-o-' . $i . ':\\1;';
	if ( strpos( $t, 's' ) ) $r .= '-ms-' . $i . ':\\1;';
	return $r;
}


// When the MAD begins..
if ( ! file_exists( $files ) ) header( 'Location: /' );

elseif ( in_array( $_csc->format, array( 'png', 'jpg', 'jpeg', 'gif' ) ) ) {
	header( 'Content-type: image/' . $_csc->format );
	readfile( $files );


} elseif ( in_array( $_csc->format, array( 'css', 'js' ) ) ) {
	$bc = file_get_contents( $files );
	$xp = xp( '/**', '**/' );

	if ( $_csc->format == 'css' ) {
		header( 'Content-type: text/css' );
		$list = array(
			'border-radius' => 'wm',
			'box-sizing' => 'wm',
			'column-count' => 'wm',
			'transform' => 'woms',
			'transition' => 'woms'
		);

		foreach ( $list as $x => $v ) {
			$preg[] = '/' . $x . ':(.*?);/is';
			$replace[] = pfx( $v, $x );
		}

		$bc = preg_replace( $preg, $replace, $bc );

	} else header( 'Content-type: text/javascript' );

	// Remove comments
	$r = preg_replace( '#/\*.*?\*/#s', '', $bc );

	// Remove whitespace
	$r = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $r );

	// Remove trailing whitespace at the start
	$r = preg_replace( '/\s\s+(.*)/', '$1', $r );

	// Remove unnecessary ;'s
	$r = str_replace( ';}', '}', $r );

	//echo ( $xp ? '/*' . $xp . '*/' . "\n" : '' ) . $r;
	echo $bc;


} elseif ( in_array( $_csc->format, array( 'ttf', 'eot', 'otf', 'woff' ) ) ) {
	header( 'Content-type: application/font-' . $_csc->format );	
	readfile( $files );


} else {
	header( 'Content-type: application/' . $_csc->format );	
	readfile( $files );

} // END of code 
