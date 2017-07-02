<?php

function set_nonaktif($a,$id){
  $sql = "UPDATE pengguna set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE pengguna set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function tampil($a){
  $sql = "select * from pengguna where aktif='1'";
  return mysqli_query($a,$sql);
}

function tampil_nonaktif($a){
  $sql = "select * from pengguna where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_pengguna_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM pengguna WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

function insert($a){
  $passwd = md5($_POST['username']);
  $sql = "INSERT INTO pengguna (username, password, hak_akses_id, nama_panggilan, nama_lengkap) VALUES ('{$_POST['username']}', '$passwd', {$_POST['nama_hak_akses']}, '{$_POST['nama_panggilan']}', '{$_POST['nama_lengkap']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function ubah($a){
  $id = $_GET['id'];
  $sql = "UPDATE pengguna set username='{$_POST['username']}', nama_panggilan='{$_POST['nama_panggilan']}',nama_lengkap='{$_POST['nama_lengkap']}',hak_akses_id='{$_POST['nama_hak_akses']}' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}


function hapus_permanen($a,$id){
  $sql = "DELETE FROM pengguna WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}


?>
