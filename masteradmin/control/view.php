<?php
#### BAGIAN AKSI PADA TABEL START ####
function deleterow($modname, $id){
  $getid = $_GET['id'];
  print '<a href="?mod='.$modname.'&del='.$id.'"><span class="fa fa-trash"></span></a>';
}

function editonrow($modname, $id){
  print '<a href="?mod='.$modname.'_ubah&id='.$id.'"><span class="fa fa-edit"></span></a>';
}

function nonaktifonrow($modname, $id){
  print '<a  href="?mod='.$modname.'&non='.$id.'"><span class="fa fa-check"></span></a>';
}

function aktifonrow($modname, $id,$pesan){
//  print '<a href="?mod='.$modname.'&id='.$id.'"><span class="fa fa-trash"></span></a>';
  print '<a href="?mod='.$modname.'&id='.$id.'" title="click for delete" onclick="'.$pesan.'"><span class="fa fa-trash"></span></a>'; 

}
#### BAGIAN AKSI PADA TABEL END ####

#### BAGIAN ALERT START ####
function alert_success($word){
  print '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Simpan Berhasil! </strong> '.$word.'.
        </div>';
}

function alert_warning($word){
  print '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Perhatian! </strong> '.$word.'.
        </div>';
}

#### BAGIAN ALERT STOP ####

#### BAGIAN SELET START####
function selectdata($a, $label, $name, $query, $valuefield, $captionfield) {
    $sql = "select * from $query";
    $hasil = mysqli_query($a,$sql);
    print '<select name="'.$name.'" class="form-control select2" style="width: 100%;">
          <option value="'.$value.'">'.$caption.'</option>';
          while ($data = mysqli_fetch_array($hasil,MYSQLI_ASSOC)) {
            print '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
          }
        print '</select>';
}

function selectdataedit($a,$label, $name, $query, $valuefield, $captionfield, $value, $caption) {
    $sql = "select * from $query";
    $hasil = mysqli_query($a, $sql);
          print '<select name="'.$name.'" class="form-control select2" style="width: 100%;">
                    <option value="'.$value.'">'.$caption.'</option>';
            while ($data = mysqli_fetch_array($hasil,MYSQLI_ASSOC))
            {
              print '<option value="'.$data[$valuefield].'">'.$data[$captionfield].'</option>';
            }
              print '</select>';
}

#### BAGIAN SELET END####

 ?>
