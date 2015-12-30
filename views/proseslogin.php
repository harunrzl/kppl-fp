<?php 
	session_start();
	// Sisipkan File Koneksi
	include "koneksi.php";
	// Jika Login
	if (isset($_POST['login'])){
		$value = $_POST['akunvalue'];
		$user = $_POST['login_username'];
		$pass = $_POST['login_password'];
	
		if ($value == "psikolog"){
			$user = $user;
			$pass = sha1($pass);
			$cek_user = mysql_query("SELECT * FROM user_login WHERE username = '$user' AND password = '$pass'");
			$hasil = mysql_fetch_array($cek_user);
			// Simpan Session USER
			$_SESSION['login_username'] = $hasil['username'];
			// Arahkan ke Halaman Admin
			redirect("admin");
		} 
		

		else if($value == "user_cl"){
			$user = $user;
			$pass = $pass;
			$f = $db->f( 'users', '*', 'WHERE name = ? AND pass = ?', array( $user, $pass ) );
			// Simpan Session USER //
			if ( $f ) {
				$_SESSION['login_client'] = $f->id;
				$db->u( 'users', 'SET session_time=? WHERE id=?', array( time() + $f->session_value, $f->id ) );
			// Arahkan ke Halaman User
				redirect("chat");
			} else echo "<script>alert('Maaf Username/Password Salah');</script>";echo "<script>window.location.href='login.html';</script>";
		}
		
		else {
			echo "<script>alert('Maaf Tipe Akun belum dipilih');</script>";
			echo "<script>window.location.href='login.html';</script>";
		}
}
?>