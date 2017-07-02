<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //biar gak ada warning pas app nya jalan
session_start();
session_destroy();
?>
<meta http-equiv="refresh" content="2;url=login" />
