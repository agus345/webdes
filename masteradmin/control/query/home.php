<?php

function update_last($a,$id,$new_pic){
  $sql = "UPDATE banner set foto='$new_pic' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

// function tampil_last_id($a){
//   $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM banner order by id desc limit 1"),MYSQLI_ASSOC);
//   return $row;
// }



function set_nonaktif($a,$id){
  $sql = "UPDATE banner set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE banner set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function hapus_permanen($a,$id){
  $sql = "DELETE FROM banner WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function tampil_nonaktif($a){
  $sql = "select * from banner where aktif='0'";
  return mysqli_query($a,$sql);
}

function insert($a,$upic){
  $sql = "INSERT INTO banner (foto,alt) VALUES ('$upic','{$_POST['judul']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

// Proses Ubah Start
function tampil($a){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM profil"),MYSQLI_ASSOC);
  return $row;
}
function ubah($a,$upic){
  if ($upic == "") {
    $sql = "UPDATE profil set nama='{$_POST['nama']}',jabatan='{$_POST['jabatan']}',periode='{$_POST['periode']}'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  }else{
    
  $sql = "UPDATE profil set nama='{$_POST['nama']}',jabatan='{$_POST['jabatan']}',periode='{$_POST['periode']}', foto='$upic'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}

function ubah_sambutan($a){
    $sambutan = $_POST['sambutan'];
    $sql = "UPDATE profil set sambutan='$sambutan'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());

}

// Proses Ubah End

?>