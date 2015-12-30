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
			$cek_session = mysql_query("SELECT * FROM users WHERE name = '$user' AND pass = '$pass'");
			$result = mysql_fetch_array($cek_session);
			// Simpan Session USER
			$_SESSION['login_client'] = $result['id'];
			// Arahkan ke Halaman User
			redirect("chat");
		}
		
		else {
			echo "<script>alert('Maaf Username/Password Anda Salah');</script>";
			echo "<script>window.location.href='login.html';</script>";
		}
}
?>