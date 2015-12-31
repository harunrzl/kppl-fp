<?php
	
	if(isset($_POST['submit-data'])){
		$time = $_POST['time-client']*60;
		$cluser = $_POST['user-client'];
		$userpass = $_POST['pass-client'];
		$hasil = $db->i( 'users', 'session_value,name,pass', array( $time, $cluser, $userpass ) );
		
		if ($hasil){
			echo "<script>alert('Data berhasil Disimpan');</script>";
			redirect("admin");
		}
		else {
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}	
?>
