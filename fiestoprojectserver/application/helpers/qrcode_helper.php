<?php

function generateQRCode($content) {
    $pngAbsoluteFilePath = realpath("qrcodes") . "/$content.png";
    if (!file_exists($pngAbsoluteFilePath)) {
        include_once APPPATH . 'third_party/phpqrcode/qrlib.php';
        QRcode::png($content, $pngAbsoluteFilePath, 'L', 10, 0);
    };
}

function get_card_template($data) {
    $nama = $data['nama'];
    $id = $data['id'];
    generate_card_template_a($nama, $id);
}

function generate_card_template_a($nama, $id) {

    $gambar_qrcode = realpath("qrcodes") . "/$id.png";

    if (!file_exists($gambar_qrcode)) {
        generateQRCode($id);
    }

    $imgPath = realpath("images/card_template.png"); //background kartu

    $image = imagecreatefrompng($imgPath);
    $color = imagecolorallocate($image, 0, 0, 0);

    if (strlen($nama) < 20) {
        $fontSize1 = 30; //nama
        $fontSize2 = 30; //no_id
    } else {
        $fontSize1 = 30; //nama
        $fontSize2 = 30; //no_id
    }

    $x = 1005; //lebar gambar background besar
    $y = 639; //tinggi gambar background besar

    $font_path1 = realpath("fonts/Roboto-Black.ttf"); //'./Roboto-Black.ttf'; //font untuk nama
    $font_path2 = realpath("fonts/Roboto-Light.ttf"); //'./Roboto-Light.ttf'; //font untuk nomor peserta


    $qrcode_image = imagecreatefrompng($gambar_qrcode);  //gambar qrcode


    $outputImage = imagecreatetruecolor($x, $y);
    imagecopyresized($outputImage, $image, 0, 0, 0, 0, $x, $y, $x, $y);
    imagecopyresized($outputImage, $qrcode_image, 710, 45, 0, 0, 250, 250, 210, 210);

    imagettftext($outputImage, $fontSize1, 0, 50, 510, $color, $font_path1, $nama);
    imagettftext($outputImage, $fontSize2, 0, 50, ($fontSize1 + 520), $color, $font_path2, $id);


    /* RESIZE IMAGE */
    $quality = 80;

    $maxWidth = 480;
    $maxHeight = 480;
    $origWidth = $x;
    $origHeight = $y;

    $widthRatio = $maxWidth / $origWidth;
    $heightRatio = $maxHeight / $origHeight;


    // Ratio used for calculating new image dimensions.
    $ratio = min($widthRatio, $heightRatio);

    $newWidth = (int) $origWidth * $ratio;
    $newHeight = (int) $origHeight * $ratio;


    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImage, $outputImage, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
    /* END RESIZE IMAGE */

    //simpan dulu
    $alamat_kartu = realpath("cards") . "/kartu_" . $id . ".png";
    imagepng($newImage, $alamat_kartu);

    //tampilkan dilayar

    header("Content-type: image/png");
    imagepng($newImage);
    imagedestroy($newImage);
    imagedestroy($outputImage);
    die();
}
