<?php

function update_last($a,$id,$new_pic){
  $sql = "UPDATE gallery set foto='' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function tampil_last_id($a){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM gallery order by id desc limit 1"),MYSQLI_ASSOC);
  return $row;
}



function set_nonaktif($a,$id){
  $sql = "UPDATE gallery set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE gallery set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function hapus_permanen($a,$id){
  $sql = "DELETE FROM gallery WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function tampil($a){
  $sql = "select * from gallery where aktif='1'";
  return mysqli_query($a,$sql);
}


function tampil_nonaktif($a){
  $sql = "select * from gallery where aktif='0'";
  return mysqli_query($a,$sql);
}

function insert($a,$upic){
  $sql = "INSERT INTO gallery (foto,alt) VALUES ('$upic','{$_POST['judul']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



// Proses Ubah Start
function tampil_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM gallery WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}
function ubah($a,$upic){
  $id = $_GET['id'];
  if ($upic == "") {
    $sql = "UPDATE gallery set alt='{$_POST['judul']}' WHERE id='$id'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
    
  $sql = "UPDATE gallery set alt='{$_POST['judul']}', foto='$upic' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}
// Proses Ubah End



?>