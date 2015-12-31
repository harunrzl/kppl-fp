<?php 
	session_start();
	// Cek Login Apakah Sudah Login atau Belum
	if (!isset($_SESSION['login_username'])){
	// Jika Tidak Arahkan Kembali ke Halaman Login
		redirect( 'login' );
	} else {
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Welcome</title>
	<link href="../assets/css/admin.css" rel="stylesheet" />
	<link href="../assets/css/material.min.css" rel="stylesheet" />
	<link href="../assets/js/material.min.js" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<base href="<?= $_csc->dirpath() ?>" />
</head>

<body>
	<p style="padding:10px;">Selamat Datang <?php echo $_SESSION['login_username']; ?><b> [Admin] <a href="logout.php">Logout</a></b></p>
	<header>
	  <div class="container">
		<h1>Create New User Client</h1>
	  </div>
	</header>

	  <section>
		<div class="container">
		  <p>Pilih berapa lama waktu konsultasi.</p>

		  <select id="selValue">
			<option value="30" selected="selected">30 Menit</option>
			<option value="60">1 Jam</option>
			<option value="90">1.5 Jam</option>
			<option value="120">2 Jam</option>
			<option value="180">3 Jam</option>
			<option value="240">4 Jam</option>
		  </select>
		  <i class="fa fa-sort-desc"></i>

		  <input type="button" class="button-create-save button-generate mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" name="create" value="Create" />

		</div>
		</section>
	<form action="saveclient.php" method="post">	
	  <section>
		<p>Lama Waktu :</p><input class="mdl-textfield__input bold-type" type="text" name="time-client" id="long_time" />
		<p>Username   :</p><input class="mdl-textfield__input bold-type user" type="text" name="user-client" id="user" />
		<p>Password   :</p><input class="mdl-textfield__input bold-type pass" type="text" name="pass-client" id="pass" />
		<input type="submit" name="submit-data" class="button-create-save mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" />
	  </section>
	</form>	
	</body>
	<script>
		function generateUsername() {
		var	charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ",
		resultuser = ""; 
			
		for (var i = 0, n = charset.length; i < 8; i++) {
			resultuser += charset.charAt(Math.floor(Math.random() * n));
		}
		
		return resultuser;
		}
		
		function generatePassword() {
		var charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@",
		resultpass = ""; 
			
		for (var i = 0, n = charset.length; i < 8; i++) {
			resultpass += charset.charAt(Math.floor(Math.random() * n));
		}
	  
		return resultpass;
		}

	function getNewGenerate() {
		var time = $('#selValue').val();
		$('#long_time').val(time+" Menit");
		$('#user').val(generateUsername());
		$('#pass').val(generatePassword());
	}    

	$(document).ready(function () {	
		$('.button-generate').click(function () {
			getNewGenerate();
			$(this).text('Generate Again');
			return false;
		});
	});    
	</script>
</html>

<?php
}
?>
