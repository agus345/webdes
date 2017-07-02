<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //biar gak ada warning pas app nya jalan
session_start();
require_once "control/config.php"; //konfigurasi database
require "control/session/ceklogin.php"; //periksa apakah sudah login
require_once "control/functions.php"; // Fungsi Global
require_once "control/constant.php"; //Konfigurasi Module dan TimeZone
require_once "control/view.php"; // Fungsi yang berkaitan dengan interface
require_once "header.php"; // Bagian Header (CSS)

    $mod = $_GET['mod']; //ambil nama modul
    $op = $_GET['hal'];

    if ($mod == "") {
        if ($op == "") {
            $mod = MODULE_PATH . 'home/home'; //lokasi modul default (home)
            require_once "control/query/home.php"; //ambil fungsi-fungsi yang berhubungan dengan database
        } else {
            $mod = $op;
        }
    } else {
        if (preg_match('/_/', $mod)) {
            $modname = explode('_', $mod);
            $mod = MODULE_PATH . $modname[0] . '/' . $mod; //tampilkan modul yang dipanggil
            require_once "control/query/".$modname[0].".php"; //ambil fungsi-fungsi yang berhubungan dengan database
        } else {
            $mod = MODULE_PATH . $mod . '/' . $mod;
            require_once "control/query/".$_GET['mod'].".php"; //ambil fungsi-fungsi yang berhubungan dengan database
        }
    }
?>
<body>
    <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <?php 
            require_once "top.php"; // Menu Atas
            require_once "sidebar.php"; // Menu Samping
        ?>
            <!-- /.navbar-static-side -->
    </nav>

        <!-- SECTION CONTENT START    -->
        <?php
        if (!file_exists($mod . '.php')) { //periksa apakah modulnya ada?
            print '<meta http-equiv="refresh" content="0;url=index.php" />'; //kalau tidak ada kembali ke halaman utama
        } else {
            include $mod . '.php';
        }
        ?>       
        <!-- SECTION CONTENT END    -->

    </div>
 
    <?php 
    require_once "required-js.php";  // Bagian JS
    ?> 
</body>
</html>
