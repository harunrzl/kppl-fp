<?php
	$opt_id = substr( $_csc->uri[2], 1 );
	$his = $db->f( 'users', '*', 'WHERE id=?', $opt_id );

	if ( ! $his || $his->id == $me->id ) redirect( 'chat' );
	$f = $db->r( 'chat', '*', 'WHERE (uid=? AND toid=?) OR (uid=? AND toid=?) ORDER BY id', array( $me->id, $his->id, $his->id, $me->id ) );
?>
<style>
#countdown {
	text-align: center;
	padding-top: 11px;
	font-size: 28px;
}
</style>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/countdown.js"></script>
<div id="countdown"></div>
<form class="box" method="post" style="margin-top: 5%;">
	<div class="titles">Chat with <?= $his->name ?></div>
	<div id="chatbox">
	<?php foreach ( $f as $r ) { ?>
		<div>
			<div class="chats <?= $r['uid'] == $me->id ? 'me' : 'him' ?>">
				<?= $r['isi'] ?>
			</div>
			<div class="clear"></div>
		</div>
	<?php } ?>
	</div>

	<div style="border-top: 1px solid #ccc; padding: 11px 0;">
		<input type="text" name="isi" class="chatinput" autofocus>
		<input type="hidden" name="toid" value="<?= $his->id ?>">
		<button style="padding: 9px; width: 10%;">Chat</button>
	</div>
</form>

<script>
$( '#countdown' ).countdown( '<?= date( 'Y/m/d h:i:s', $me->session_time ) ?>', function(event) {
	$(this).html(event.strftime('%H:%M:%S'));
} );
</script>
