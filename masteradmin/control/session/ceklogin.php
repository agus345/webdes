<?php
//session_start();
$sql = "select * from pengguna where username='' and password='' and aktif='1'";
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['password'])) {
        $sql = "select * from pengguna where username='{$_SESSION['username']}' and password='{$_SESSION['password']}' and aktif='1'";
    }
}

$result = $conn->query($sql);

if ($result->num_rows == 0) {

    echo '<meta http-equiv="refresh" content="0;url=login" />';
    die();
}
?>
