<?php 
	session_start();
	// Cek Login Apakah Sudah Login atau Belum
	if (!isset($_SESSION['login_username'])){
	// Jika Tidak Arahkan Kembali ke Halaman Login
		header("location:login.html");
	} else {
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<title></title>
</head>

<body>
	Selamat Datang <?php echo $_SESSION['login_username']; ?> <b> [User] <a href="logout.php">Logout</a></b>
</body>
</html>
<?php
	}
?>