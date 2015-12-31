<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	mysql_connect("localhost","root","") or die("Koneksi Gagal Tersambung");
	mysql_select_db("psikolog") or die("Database tidak dapat ditemukan");
?>