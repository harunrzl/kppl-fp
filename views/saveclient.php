<?php
	// Sisipkan File Koneksi
	include "koneksi.php";
	
	if(isset($_POST['submit-data'])){
		$time = $_POST['time-client']*60;
		$cluser = $_POST['user-client'];
		$userpass = $_POST['pass-client'];
		$insert_client = "INSERT INTO `users` (`session_value`, `name`, `pass`) VALUES ('$time', '$cluser', '$userpass');";
		$hasil = mysql_query($insert_client);
		
		if ($hasil){
			echo "<script>alert('Data berhasil Disimpan');</script>";
			redirect("admin");
		}
		else {
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}	
?>