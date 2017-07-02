<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include "control/config.php";
$txt_user = $_POST['username'];
$en_pass = md5($_POST['password']);

$sql = "select * from pengguna where username='$txt_user' and password='$en_pass' and aktif='1'";

$rec = $conn->query($sql);

if ($rec ->num_rows > 0 and isset($_POST['username'])) {
		$hasil =  $conn->query($sql);
		$data = $hasil->fetch_assoc();

		$_SESSION['id'] = $data['id'];
		$_SESSION['username'] = $txt_user;
		$_SESSION['password'] = $en_pass;

		$_SESSION['hak_akses'] = $data['hak_akses'];
		$_SESSION['nama_panggilan'] = $data['nama_panggilan'];
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];

		if($data['foto'] == ""){
			$_SESSION['foto'] = "profile";
		}else{
			$_SESSION['foto'] = $data['foto'];
		}

    $pesan = "Mohon Tunggu";

		?>
      <meta http-equiv="refresh" content="0;url=index" />
      <?php
} else {
	$pesan = "Periksa Username dan Password Anda";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                        <?php
                        if(isset($_POST['username']))
                          { ?>
                              <p class="login-box-msg"><b><?php echo $pesan ?></b></p>
                              <meta http-equiv="refresh" content="1;url=login" />
                          <?php 
                          } ?>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Nama Pengguna" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Masuk</button>
                                <!-- Change this to a button or input when using this as a form -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "required-js.php";
?>
</body>

</html>

