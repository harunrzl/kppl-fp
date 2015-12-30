<a href="kppl/../../logout.php"><button>Logout</button></a>
<?php
	$f = $db->r( 'users', '*', 'ORDER BY id DESC' );
	foreach ( $f as $r ) {
?>
<div class="box">
	<a href="+<?= $r['id'] ?>"><?= $r['name'] ?></a>
</div>
<?php } ?>