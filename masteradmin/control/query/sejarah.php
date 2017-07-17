<?php

function hapus_permanen($a,$id){
  $sql = "DELETE FROM sejarah WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function ubah($a,$upic,$id){
  if ($upic == "") {
    $sql = "UPDATE sejarah set judul='{$_POST['judul']}',isi='{$_POST['isi']}' WHERE id = '$id'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
  $sql = "UPDATE sejarah set judul='{$_POST['judul']}',isi='{$_POST['isi']}', foto='$upic' WHERE id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}

function ubahfoto($a,$id){
  $sql = "UPDATE sejarah set foto='' where id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  
}

function tampil_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM sejarah WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

function insert($a,$upic){
  if ($upic == "") {
  $sql = "INSERT INTO sejarah (judul,isi) VALUES ('{$_POST['judul']}','{$_POST['isi']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
  $sql = "INSERT INTO sejarah (judul,isi,foto) VALUES ('{$_POST['judul']}','{$_POST['isi']}','$upic')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }

}
function tampil($a){
  $sql = "select * from sejarah";
  return mysqli_query($a,$sql);
}








function set_nonaktif($a,$id){
  $sql = "UPDATE sejarah set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE sejarah set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function tampil_nonaktif($a){
  $sql = "select * from sejarah where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_sejarah_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM sejarah WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}







?>
