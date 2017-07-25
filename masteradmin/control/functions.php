<?php

function UploadImageResize($new_name,$file,$dir,$width){
   //direktori gambar
   $vdir_upload = $dir;
   $vfile_upload = $vdir_upload . $_FILES[''.$file.'']["name"];

   //Simpan gambar dalam ukuran sebenarnya
   move_uploaded_file($_FILES[''.$file.'']["tmp_name"], $dir.$_FILES[''.$file.'']["name"]);

   //identitas file asli
   $im_src = imagecreatefromjpeg($vfile_upload);
   $src_width = imageSX($im_src);
   $src_height = imageSY($im_src);

   //Set ukuran gambar hasil perubahan
   $dst_width = $width;
   $dst_height = ($dst_width/$src_width)*$src_height;

   //proses perubahan ukuran
   $im = imagecreatetruecolor($dst_width,$dst_height);
   imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

   //Simpan gambar
   imagejpeg($im,$vdir_upload . $new_name,100);
   
   //Hapus gambar di memori komputer
   imagedestroy($im_src);
   imagedestroy($im);
   $remove_small = unlink("$vfile_upload");
 }


function getmodname($mod) {
    $x = explode('_', $mod);
    $val = $x[0];
    return $val;
}

function getanytampil($a,$table, $where, $id, $tampil) {
    $sql = "select * from $table where $where='$id'";
    $hasil = mysqli_query($a,$sql);
    $data = mysqli_fetch_array($hasil,MYSQLI_ASSOC);
    $val = $data[$tampil];
    return $val;
}


function upload_file($varname, $foldername) {
    $var = $_FILES[$varname]['name'];
    $path = $foldername . '/' . $var;
    if (strlen($var) > 0) {
        if (is_uploaded_file($_FILES[$varname]['tmp_name'])) {
            move_uploaded_file($_FILES[$varname]['tmp_name'], $path);
        }
    }
    return $var;
}

function cropImage($nw, $nh, $source, $stype, $dest) {

 $size = getimagesize($source); // ukuran gambar

 $w = $size[0];

 $h = $size[1];

	 switch($stype) { // format gambar

		 case 'gif':

		 $simg = imagecreatefromgif($source);

		 break;

		 case 'jpg':

		 $simg = imagecreatefromjpeg($source);

		 break;
		case 'png':

		 $simg = imagecreatefrompng($source);

		break;

	}

	 $dimg = imagecreatetruecolor($nw, $nh); // menciptakan image baru

	 $wm = $w/$nw;

	 $hm = $h/$nh;

	 $h_height = $nh/2;

	 $w_height = $nw/2;

		 if($w> $h) {

			 $adjusted_width = $w / $hm;

			 $half_width = $adjusted_width / 2;

			 $int_width = $half_width-$w_height;

			 imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);

		 } elseif(($w <$h) || ($w == $h)) {

		 $adjusted_height = $h / $wm;

		 $half_height = $adjusted_height / 2;

		 $int_height = $half_height - $h_height;

		 imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);

		} else {

		 imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);

		 }

		 imagejpeg($dimg,$dest,100);

}

?>
