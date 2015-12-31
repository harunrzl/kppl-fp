<?php 
	// Jika Login
	if (isset($_POST['login'])){
		$value = $_POST['akunvalue'];
		$user = $_POST['login_username'];
		$pass = $_POST['login_password'];
	
		if ( $value == "psikolog" ){
			$f = $db->f( 'user_login', '*', 'WHERE username=? AND password=?', array( $user, sha1( $pass ) ) );
			if ( $f ) {
				// Simpan Session USER
				$_SESSION['login_username'] = $f->username;
				// Arahkan ke Halaman Admin
				redirect( 'admin' );

			} else {
				echo "<script>alert('Maaf Username/Password Salah');</script>";
				echo "<script>window.location.href='" . $_csc->dirpath() . "login';</script>";

			}
		

		} elseif ( $value == "user_cl" ) {
			$f = $db->f( 'users', '*', 'WHERE name = ? AND pass = ?', array( $user, $pass ) );

			// Simpan Session USER //
			if ( $f->session_value ) {
				$_SESSION['login_client'] = $f->id;
				$db->u( 'users', 'SET session_time=? WHERE id=?', array( time() + $f->session_value, $f->id ) );

				// Arahkan ke Halaman User
				redirect("chat");

			} else {
				echo "<script>alert('Maaf Username/Password Salah');</script>";
				echo "<script>window.location.href='" . $_csc->dirpath() . "login';</script>";

			}

		
		} else {
			echo "<script>alert('Maaf Tipe Akun belum dipilih');</script>";
				echo "<script>window.location.href='" . $_csc->dirpath() . "login';</script>";

		}

}
