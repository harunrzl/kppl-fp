<?php
	/* Proses Logout : Hapus Session User Lalu Arahkan ke Halaman Login */ 
	session_start();
	session_destroy();
	session_unset();
	redirect('index.php');
?>