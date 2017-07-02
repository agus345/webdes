<?php

function set_nonaktif($a,$id){
  $sql = "UPDATE hak_akses set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE hak_akses set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function tampil($a){
  $sql = "select * from hak_akses where aktif='1'";
  return mysqli_query($a,$sql);
}

function tampil_nonaktif($a){
  $sql = "select * from hak_akses where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_otorisasi_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM hak_akses WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

function insert($a){
  $passwd = $_POST['nama'];
  $sql = "INSERT INTO hak_akses (nama) VALUES ('{$_POST['nama']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function ubah($a){
  $id = $_GET['id'];
  $sql = "UPDATE hak_akses set nama='{$_POST['nama']}' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}


function hapus_permanen($a,$id){
  $sql = "DELETE FROM hak_akses WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}


?>
