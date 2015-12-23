<?php
/**
 * csc_pdo class
 * It's part of Lrdc Framework,
 * But you can use it separately.
 *
 * How to use:
 * - Fetching 1 row
 *   with mysql_query:
 *   $result = mysql_query( "SELECT * FROM table WHERE column='$value'" );
 *   $fetch = mysql_fetch_object( $result );
 *   echo $fetch->column;
 *
 *   with csc_pdo:
 *   $f = $db->f( 'table', '*', 'WHERE column=?', $value );
 *   echo $f->column;
 *
 * - Fetching multiple row
 *   with mysql_query:
 *   $query = "SELECT column FROM table WHERE column1='$value1' AND column2='$value2'";
 *   $result = mysql_query( $query );
 *   while ( $row = mysql_fetch_assoc( $result ) ) {
 *       echo $row['column'] . '<br>';
 *   }
 *
 *   with csc_pdo:
 *   $f = $db->r( 'table', 'column', 'WHERE column1=? AND column2=?', array( $value1, $value2 ) );
 *   foreach ( $f as $r ) {
 *       echo $r['column'] . '<br>';
 *   }
 *
 */

class csc_pdo {
	public $db_name;
	public $pfx;
	protected $pfx_;
	protected $dbh;
	private $db_user;
	private $db_pass;

	public function __construct( $db_user, $db_pass, $db_name ) {
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->connect( $db_name );
	}

	// Connect to SQL
	public function connect( $db_name ) {
		$db_name = ( $db_name != '' ) ? ';dbname=' . $db_name : '';
		$dsn = 'mysql:host=localhost;charset=utf8' . $db_name;
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		);

		try {
			$this->dbh = new PDO( $dsn, $this->db_user, $this->db_pass, $options );
		} catch ( PDOException $e ) {
			return false;
		}
	}

	// Temporary table pfx
	public function pfx( $pfx ) {
		if ( $pfx == 'roll' ) {
			$this->pfx = $this->pfx_;
			$this->pfx_ = null;
		} else {
			$this->pfx_ = $this->pfx;
			$this->pfx = $pfx;
		}
	}

	// Determine table names
	public function get_table( $table ) {
		$table = $this->pfx . $table;
		if ( $this->pfx_ ) $this->pfx( 'roll' );
		return $table;
	}

	// Any Query
	public function query( $query, $array=null ) {
		$array = ( ! is_array( $array ) && $array ) ? array( $array ) : $array;
		$sth = $this->dbh->prepare( $query );
		return $sth->execute( $array );
	}

	// Do fetch
	public function f ( $table, $field, $options=null, $array=null ) {
		$array = ( ! is_array( $array ) && $array ) ? array( $array ) : $array;
		$table = $this->get_table( $table );
		$sth = $this->dbh->prepare( "SELECT $field FROM $table $options" );
		$sth->execute( $array );
		return $sth->fetch( PDO::FETCH_OBJ );
	}

	// Select as row
	public function r ( $table, $field, $options=null, $array=null ) {
		$array = ( ! is_array( $array ) && $array ) ? array( $array ) : $array;
		$table = $this->get_table( $table );
		$sth = $this->dbh->prepare( "SELECT $field FROM $table $options" );
		$sth->execute( $array );
		while ( $r[] = $sth->fetch( PDO::FETCH_ASSOC ) );
		if ( empty( $r[count( $r ) - 1] ) ) unset( $r[count( $r ) - 1] );
		return $r;
	}

	// Insert Query
	public function i ( $table, $field, $array=null ) {
		$array = ( ! is_array( $array ) && $array ) ? array( $array ) : $array;
		for ( $x=1; $x<=count( $array ); $x++ ) $f[] = '?';
		$val = implode( ',', $f );
		$table = $this->get_table( $table );
		$sth = $this->dbh->prepare( "INSERT INTO $table ($field) VALUES ($val)" );
		$sth->execute( $array );
		return $this->dbh->lastInsertId();
	}

	// Update Query
	public function u ( $table, $options=null, $array=null ) {
		$array = ( ! is_array( $array ) && $array ) ? array( $array ) : $array;
		$table = $this->get_table( $table );
		$sth = $this->dbh->prepare( "UPDATE $table $options" );
		$sth->execute( $array );
	}

	// Delete Query
	public function d ( $table, $options=null, $array=null ) {
		$array = ( ! is_array( $array ) && $array ) ? array( $array ) : $array;
		$table = $this->get_table( $table );
		$sth = $this->dbh->prepare( "DELETE FROM $table $options" );
		$sth->execute( $array );
	}
}
