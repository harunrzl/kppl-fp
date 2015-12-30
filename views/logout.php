<?php
	/* Proses Logout : Hapus Session User Lalu Arahkan ke Halaman Login */ 
	session_destroy();
	redirect( '/' );
