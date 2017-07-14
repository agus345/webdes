<?php

function ubahfoto($a,$id){
  $sql = "UPDATE artikel set foto='' where id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  
}


function ubah($a,$upic,$id){
  if ($upic == "") {
    $sql = "UPDATE artikel set judul='{$_POST['judul']}',deskripsi_singkat='{$_POST['deskripsi_singkat']}',kategori_artikel_id='{$_POST['kategori_artikel_id']}',isi='{$_POST['isi']}' WHERE id = '$id'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
  $sql = "UPDATE artikel set judul='{$_POST['judul']}',deskripsi_singkat='{$_POST['deskripsi_singkat']}',kategori_artikel_id='{$_POST['kategori_artikel_id']}',isi='{$_POST['isi']}', foto='$upic' WHERE id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}

function tampil_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM artikel WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}



function tampil($a){
  $sql = "select * from anggarandesa";
  return mysqli_query($a,$sql);
}

function tampil_nonaktif($a){
  $sql = "select * from artikel where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_artikel_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM artikel WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

function hapus_permanen($a,$id){
  $sql = "DELETE FROM anggarandesa WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}


?>
