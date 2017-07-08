<?php

function hapus_permanen($a,$id){
  $sql = "DELETE FROM perdes WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function ubah($a,$upic,$id){
   $sql = "UPDATE perdes set aturan='{$_POST['aturan']}' WHERE id='$id'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());
  
  
}

function tampil_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM perdes WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

/*function insert($a,$upic){
  $sql = "INSERT INTO perdes (aturan) VALUES ('{$_POST['aturan']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  

}*/
function tampil($a){
  $sql = "select * from perdes";
  return mysqli_query($a,$sql);
}

function set_nonaktif($a,$id){
  $sql = "UPDATE perdes set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE perdes set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function tampil_nonaktif($a){
  $sql = "select * from perdes where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_perdes_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM perdes WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}
?>
