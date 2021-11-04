<?php

function fiestoupload($fieldname, $destdir, $destfile, $maxsize, $allowedtypes = "gif,jpg,jpeg,png") {

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
