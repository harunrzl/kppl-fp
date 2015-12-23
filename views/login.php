<?php
if ( $_POST ) {
    /* TODO: ADD PASSWORD CHECK */
    $f = $db->f( 'users', 'id', 'WHERE name=? AND BINARY pass=?', array( $_POST['user'], $_POST['pass'] ) );
    if ( $f ) {
        $_SESSION['user_id'] = $f->id;
        redirect( 'chat' );

    } else {
        echo 'Wrong username or password!';
        die();
    }
}

$_div = new stdClass;
$_div->title = 'Login page';
include( 'views/header.php' );
?>

<form method="post" class="box">
    <div><input type="text" name="user" placeholder="Username"></div>
    <div style="margin: 6px 0;"><input type="password" name="pass" placeholder="Password"></div>
    <button type="submit" style="padding: 6px; width: 190px;">Login</button>
</form>

<?php
include( 'views/footer.php' );