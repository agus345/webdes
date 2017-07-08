<?php

function hapus_permanen($a,$id){
  $sql = "DELETE FROM struktur_desa WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function ubah($a,$upic,$id){
  if ($upic == "") {
    $sql = "UPDATE struktur_desa set nama='{$_POST['nama']}',jabatan='{$_POST['jabatan']}' WHERE id = '$id'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
  $sql = "UPDATE struktur_desa set nama='{$_POST['nama']}',jabatan='{$_POST['jabatan']}', foto='$upic' WHERE id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}

function ubahfoto($a,$id){
  $sql = "UPDATE struktur_desa set foto='' where id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  
}

function tampil_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM struktur_desa WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

function insert($a,$upic){
  if ($upic == "") {
  $sql = "INSERT INTO struktur_desa (nama,jabatan) VALUES ('{$_POST['nama']}','{$_POST['jabatan']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
  $sql = "INSERT INTO struktur_desa (nama,jabatan,foto) VALUES ('{$_POST['nama']}','{$_POST['jabatan']}','$upic')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }

}
function tampil($a){
  $sql = "select * from struktur_desa";
  return mysqli_query($a,$sql);
}












function set_nonaktif($a,$id){
  $sql = "UPDATE artikel set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE artikel set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function tampil_nonaktif($a){
  $sql = "select * from artikel where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_artikel_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM artikel WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}







?>
