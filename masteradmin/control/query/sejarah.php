<?php
function tampil_ubah($a){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM sejarah"),MYSQLI_ASSOC);
  return $row;
}

function ubah($a,$upic){
  if ($upic == "") {
    $sql = "UPDATE sejarah set judul='{$_POST['judul']}',isi='{$_POST['isi']}'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
  $sql = "UPDATE sejarah set judul='{$_POST['judul']}',isi='{$_POST['isi']}', foto='$upic'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}

function ubahfoto($a){
  
  $sql = "UPDATE sejarah set foto=''";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  
}



function set_nonaktif($a,$id){
  $sql = "UPDATE artikel set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE artikel set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function tampil($a){
  $sql = "select * from artikel where aktif='1'";
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

function insert($a,$upic){
  $sql = "INSERT INTO artikel (judul,deskripsi_singkat,isi,kategori_artikel_id,foto) VALUES ('{$_POST['judul']}','{$_POST['deskripsi_singkat']}', '{$_POST['isi']}','{$_POST['kategori_artikel']}','$upic')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}




function hapus_permanen($a,$id){
  $sql = "DELETE FROM artikel WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}


?>
