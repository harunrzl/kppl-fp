<a href="logout.php"><button>Logout</button></a>
<?php
	$f = $db->r( 'users', '*', 'ORDER BY id DESC' );
	foreach ( $f as $r ) {
?>
<div class="box">
	<a href="chat/+<?= $r['id'] ?>"><?= $r['name'] ?></a>
</div>
<?php } ?>
