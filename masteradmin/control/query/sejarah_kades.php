<?php

function hapus_permanen($a,$id){
  $sql = "DELETE FROM sejarah_kades WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function ubah($a,$upic,$id){
  if ($upic == "") {
   $sql = "UPDATE sejarah_kades set nama ='{$_POST['nama']}' WHERE id='$id'";
    mysqli_query($a,$sql) or die(mysqli_connect_error());

  }else{

  $sql = "UPDATE sejarah_kades set jabatan='{$_POST['jabatan']}',masa_jabatan ='{$_POST['masa_jabatan ']}', WHERE id = '$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  }
}

function tampil_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM sejarah_kades WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

/*function insert($a,$upic){
  $sql = "INSERT INTO sejarah_kades (aturan) VALUES ('{$_POST['nama']}')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
  

}*/
function tampil($a){
  $sql = "select * from sejarah_kades";
  return mysqli_query($a,$sql);
}

function set_nonaktif($a,$id){
  $sql = "UPDATE sejarah_kades set aktif='0' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}

function aktif($a,$id){
  $sql = "UPDATE sejarah_kades set aktif='1' WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function tampil_nonaktif($a){
  $sql = "select * from sejarah_kades where aktif='0'";
  return mysqli_query($a,$sql);
}

function tampil_perdes_ubah($a,$id){
  $row = mysqli_fetch_array(mysqli_query($a,"SELECT * FROM sejarah_kades WHERE id = '$id' "),MYSQLI_ASSOC);
  return $row;
}

function insert($a,$upic){
  $sql = "INSERT INTO sejarah_kades (nama,jabatan,masa_jabatan) VALUES ('{$_POST['nama']}','{$_POST['jabatab']}', '{$_POST['masa_jabatan']}','$upic')";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}



function hapus_permanen($a,$id){
  $sql = "DELETE FROM sejarah_kades WHERE id='$id'";
  mysqli_query($a,$sql) or die(mysqli_connect_error());
}
?>
