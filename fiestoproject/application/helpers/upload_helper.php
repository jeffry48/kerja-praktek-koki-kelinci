<?php

function resizecalc($srcimg, $thumbcalcbase, $thumbcalcpx, $thumbcalcpxheight) {
  switch ($thumbcalcbase) {
    case 'h':
      $dsth = $thumbcalcpx;
      $dstw = round(imagesx($srcimg) / imagesy($srcimg) * $dsth);
      break;
    case 'w':
      $dstw = $thumbcalcpx;
      $dsth = round(imagesy($srcimg) / imagesx($srcimg) * $dstw);
      break;
    case 'l':
      if (imagesx($srcimg) <= imagesy($srcimg)) { //portrait
        $dsth = $thumbcalcpx;
        $dstw = round(imagesx($srcimg) / imagesy($srcimg) * $dsth);
      } else { //landscape
        $dstw = $thumbcalcpx;
        $dsth = round(imagesy($srcimg) / imagesx($srcimg) * $dstw);
      }
      break;
    case 's':
      if (imagesx($srcimg) <= imagesy($srcimg)) { //portrait
        $dstw = $thumbcalcpx;
        $dsth = round(imagesy($srcimg) / imagesx($srcimg) * $dstw);
      } else { //landscape
        $dsth = $thumbcalcpx;
        $dstw = round(imagesx($srcimg) / imagesy($srcimg) * $dsth);
      }
      break;
    case 'b':
      if ($thumbcalcpx / imagesx($srcimg) <= $thumbcalcpxheight / imagesy($srcimg)) { //ikuti x
        $dstw = $thumbcalcpx;
        $dsth = round(imagesy($srcimg) / imagesx($srcimg) * $dstw);
      } else { //ikuti y
        $dsth = $thumbcalcpxheight;
        $dstw = round(imagesx($srcimg) / imagesy($srcimg) * $dsth);
      }
      break;
    case 'f':
      $dstw = $thumbcalcpx;
      $dsth = $thumbcalcpxheight;
      break;
  }
  return array($dstw, $dsth);
}

function aindoresize($srcimgfile, $dstimgfile, $thumbcalcbase, $thumbcalcpx, $thumbcalcpxheight = 100) {
  /*
    Resize gambar (misalnya bikin thumbnail)

    string $scrimgfile : nama file asal
    string $dstimgfile : nama file tujuan
    string enum('s'|'l'|'w'|'h') $thumbcalcbase : dasar perhitungan resize menjadi thumbnail
    (shorter side, longer side, width, height).
    int $thumbcalcpx : thumbnail image width/height in pixel

    16:14 14/02/2010 tambahan:
    string enum('b'|'f') $thumbcalcbase : dasar perhitungan resize menjadi thumbnail
    b = both = maxwidth dan maxweight dua2nya ditentukan, ukuran hasil dimaksimalkan namun dipertahankan proporsional
    f = fixed = maxwidth dan maxweight dua2nya ditentukan, ukuran hasil dipaksa mengikuti ketentuan meskipun terpaksa tidak proporsional
    int $thumbcalcpxheight : thumbnail image height in pixel, hanya jika tambahan dipakai. default = 100 pixel.
   */

  $temp = explode('.', $srcimgfile);
  $extension = strtolower($temp[count($temp) - 1]);
  switch ($extension) {
    case 'jpg':
    case 'jpeg':
      $srcimg = imagecreatefromjpeg($srcimgfile);
      list($dstw, $dsth) = resizecalc($srcimg, $thumbcalcbase, $thumbcalcpx, $thumbcalcpxheight);
      $dstimg = imagecreatetruecolor($dstw, $dsth);
      if (!imagecopyresampled($dstimg, $srcimg, 0, 0, 0, 0, $dstw, $dsth, imagesx($srcimg), imagesy($srcimg)))
        pesan(_ERROR, _CANTRESAMPLE);
      if (!imagejpeg($dstimg, $dstimgfile, 100))
        return _MAYBEPERMISSION;
      break;
    case 'gif':
      $srcimg = imagecreatefromgif($srcimgfile);
      list($dstw, $dsth) = resizecalc($srcimg, $thumbcalcbase, $thumbcalcpx, $thumbcalcpxheight);
      $dstimg = imagecreatetruecolor($dstw, $dsth);
      $imgallocate = imagecolorallocate($dstimg, 0, 0, 0);
      imagecolortransparent($dstimg, $imgallocate);
      $transparent = imagecolorallocatealpha($dstimg, 255, 255, 255, 127);
      imagefilledrectangle($dstimg, 0, 0, $dstw, $dsth, $transparent);
      //==========================
      if (!imagecopyresampled($dstimg, $srcimg, 0, 0, 0, 0, $dstw, $dsth, imagesx($srcimg), imagesy($srcimg)))
        pesan(_ERROR, _CANTRESAMPLE);
      if (!imagegif($dstimg, $dstimgfile))
        return _MAYBEPERMISSION;
      break;
    case 'png':
      $srcimg = imagecreatefrompng($srcimgfile);
      list($dstw, $dsth) = resizecalc($srcimg, $thumbcalcbase, $thumbcalcpx, $thumbcalcpxheight);
      $dstimg = imagecreatetruecolor($dstw, $dsth);
      imagealphablending($dstimg, false);
      imagesavealpha($dstimg, true);
      $transparent = imagecolorallocatealpha($dstimg, 255, 255, 255, 127);
      imagefilledrectangle($dstimg, 0, 0, $dstw, $dsth, $transparent);
      //==========================
      if (!imagecopyresampled($dstimg, $srcimg, 0, 0, 0, 0, $dstw, $dsth, imagesx($srcimg), imagesy($srcimg)))
        pesan(_ERROR, _CANTRESAMPLE);
      if (!imagepng($dstimg, $dstimgfile))
        return _MAYBEPERMISSION;
      break;
  }
  return true;
}

function aindo_upload($fieldname, $destdir, $destfile, $maxsize = "-1", $allowedtypes = "gif|jpg|jpeg|png|pdf", $resize = true) {
    $ci = & get_instance();
    if ($maxsize == "-1") {
        $maxsize = $ci->config->item('max_allow_file_size');
    }
    /*
      $fieldname : field name di form
      $destdir : direktori tujuan
      $destfile : nama file (minus extension, which is always the same as uploaded)
      $maxsize : ukuran maksimum dalam byte (harus konsisten dengan MAX_FILE_SIZE di html)
      $lang : (optional) bahasa. default="id".
      $allowedtypes : (optional) jenis extension yang diizinkan, dipisahkan tanda koma. default = "gif,jpg,jpeg,png".
     */
    if ($_FILES[$fieldname]['name'] != '') {
        $maxsizeinkb = intval($maxsize / 1000);

        //Filter 1: cek apakah file terupload dengan benar
        switch ($_FILES[$fieldname]['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return $ci->lang->line('information_max_allow_file_size') . " $maxsizeinkb kbytes.";
                break;
            case UPLOAD_ERR_PARTIAL:
                return $ci->lang->line('information_file_partial_uploaded');
                break;
            case UPLOAD_ERR_NO_FILE:
                return $ci->lang->line('information_file_not_found');
                break;
        }

        //Filter 2: cek apakah ukuran sesuai yang diizinkan. Beda dengan filter 1 yang membandingkan terhadap setting php.ini, sekarang dibandingkan dengan aturan yang dibuat sendiri di config
        if ($_FILES[$fieldname]['size'] > $maxsize) {
            return $ci->lang->line('information_max_allow_file_size') . " $maxsizeinkb kbytes.";
        }

        //Filter 3: cek apakah extension sesuai yang diizinkan

        $rallowedtypes = explode('|', $allowedtypes);
        $temp = explode('.', $_FILES[$fieldname]['name']);
        $extension = strtolower($temp[count($temp) - 1]);

        $isallowed = false;
        foreach ($rallowedtypes as $allowedtype) {
            if ($extension == $allowedtype)
                $isallowed = true;
        }

        if (!$isallowed) {
            return $ci->lang->line('information_upload_allowed_types') . " $allowedtypes.";
        }

        //Filter 4: cek apakah benar-benar file gambar (hanya jika $allowedtypes="gif,jpg,jpeg,png")
        //Tidak cek MIME-type karena barubah-ubah terus
        //Tidak cek extension karena nanti dipaksa berubah
        //Cek dilakukan sebelum dipindah ke destination dir (masih di temp)

        if ($extension == "gif" || $extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $size = getimagesize($_FILES[$fieldname]['tmp_name']);
            if ($size == FALSE) {
                return $ci->lang->line('information_upload_allowed_types') . " $allowedtypes.";
            }
        }

        // CHECK IF EXTENSION IS BLOB (CHANGE IT TO JPG)
        if ($extension == 'blob'){
          $extension = 'png';
        }

        //Filter 5: Jalankan
        $thelastdestination = ($destfile == '') ? "$destdir/" . $_FILES[$fieldname]['name'] : "$destdir/$destfile.$extension";

        if (!move_uploaded_file($_FILES[$fieldname]['tmp_name'], $thelastdestination)) {
            return $ci->lang->line('information_check_permission');
        }

        if ($extension == "gif" || $extension == "jpg" || $extension == "jpeg" || $extension == "png") {
          if($resize){
            aindoresize($thelastdestination, $thelastdestination, 'l', 1000);
          }
        }

        return $ci->lang->line('notification_success_upload');
    } else {
        return $ci->lang->line('information_file_partial_uploaded');
    }
}

function aindo_delete($filename, $destdir) {
    $real_file = $destdir . $filename;
    $ci = & get_instance();
    $image_realpath = realpath($real_file);
    if (is_file($image_realpath)) {
        unlink($real_file);
        return array(
            'status' => 'success',
            'message' => $ci->lang->line('notification_success_delete_upload')
        );
    } else {
        return array(
            'status' => 'error',
            'message' => $ci->lang->line('information_delete_upload_error')
        );
    }
}

function original_fiestoupload($fieldname, $destdir, $destfile, $maxsize, $allowedtypes = "gif,jpg,jpeg,png") {
    /*
      $fieldname : field name di form
      $destdir : direktori tujuan
      $destfile : nama file (minus extension, which is always the same as uploaded)
      $maxsize : ukuran maksimum dalam byte (harus konsisten dengan MAX_FILE_SIZE di html)
      $lang : (optional) bahasa. default="id".
      $allowedtypes : (optional) jenis extension yang diizinkan, dipisahkan tanda koma. default = "gif,jpg,jpeg,png".
     */
    if ($_FILES[$fieldname]['name'] != '') {
        $maxsizeinkb = intval($maxsize / 1000);

        //Filter 1: cek apakah file terupload dengan benar
        switch ($_FILES[$fieldname]['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return _FILETOOBIG . " $maxsizeinkb kbytes.";
                break;
            case UPLOAD_ERR_PARTIAL:
                return _FILEPARTIAL;
                break;
            case UPLOAD_ERR_NO_FILE:
                return _FILEERROR1;
                break;
        }

        //Filter 2: cek apakah ukuran sesuai yang diizinkan. Beda dengan filter 1 yang membandingkan terhadap setting php.ini, sekarang dibandingkan dengan aturan yang dibuat sendiri di config
        if ($_FILES[$fieldname]['size'] > $maxsize) {
            return _FILETOOBIG . " $maxsizeinkb kbytes.";
        }

        //Filter 3: cek apakah extension sesuai yang diizinkan

        $rallowedtypes = explode(',', $allowedtypes);
        $temp = explode('.', $_FILES[$fieldname]['name']);
        $extension = strtolower($temp[count($temp) - 1]);

        $isallowed = false;
        foreach ($rallowedtypes as $allowedtype) {
            if ($extension == $allowedtype)
                $isallowed = true;
        }

        if (!$isallowed) {
            return _ALLOWEDTYPE . " $allowedtypes.";
        }

        //Filter 4: cek apakah benar-benar file gambar (hanya jika $allowedtypes="gif,jpg,jpeg,png")
        //Tidak cek MIME-type karena barubah-ubah terus
        //Tidak cek extension karena nanti dipaksa berubah
        //Cek dilakukan sebelum dipindah ke destination dir (masih di temp)

        if ($extension == "gif" || $extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $size = getimagesize($_FILES[$fieldname]['tmp_name']);
            if ($size == FALSE) {
                return _ALLOWEDTYPE . " $allowedtypes.";
            }
        }

        //Filter 5: Jalankan
        $thelastdestination = ($destfile == '') ? "$destdir/" . $_FILES[$fieldname]['name'] : "$destdir/$destfile.$extension";

        if (!move_uploaded_file($_FILES[$fieldname]['tmp_name'], $thelastdestination)) {
            return _MAYBEPERMISSION;
        }

        return _SUCCESS;
    } else {
        return _FILEPARTIAL;
    }
}
