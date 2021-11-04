<?php

/*
 * $resize_width, $resize_height, $crop_widh, $crop_height
 * no resize / no crop = -1
 * percentage resize / crop = 0 - 1
 * pixels resize / crop = >1
 */

function image_upload_thumbnail($filename, $path, $image_field_name, $resize_width = -1, $resize_height = -1, $crop_width = -1, $crop_height = -1) {
    $ci = & get_instance();

    $upload_config['file_name'] = $filename;
    $upload_config['upload_path'] = $path;
    $upload_config['allowed_types'] = $ci->config->item('allowed_types'); //  config/image.php 
    $upload_config['overwrite'] = TRUE;

    $ci->load->library('upload');
    $ci->upload->initialize($upload_config);

    $no_error = false;
    if ($ci->upload->do_upload($image_field_name)) {
        $no_error = true;

        $real_file = realpath($path) . "/" . $ci->upload->file_name;
        $image_size = getimagesize($real_file);

        $no_error_resize = true;
        //default tidak boleh 0 karena 0 berarti tidak di resize, tetapi tetap harus bisa crop
        if ($resize_width > -1 && $resize_height > -1) {
            //RESIZE IMAGE
            $upload_data = $ci->upload->data();
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = $ci->upload->upload_path . $ci->upload->file_name;
            $resize_config['new_image'] = $path;
            $resize_config['create_thumb'] = FALSE;
            $resize_config['maintain_ratio'] = TRUE;
            //ALGORITMA CARI PEMBAGIAN TERKECIL
            if ($resize_width <= 1 && $resize_height <= 1) {
                $resize_config['width'] = $image_size[0] * $resize_width;
                $resize_config['height'] = $image_size[1] * $resize_height;
            } else {
                $resize_config['width'] = $resize_width;
                $resize_config['height'] = $resize_height;
            }
            $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($resize_config['width'] / $resize_config['height']);
            //$resize_config['master_dim'] = ($dim > 0) ? "height" : "width"; //sisi terpendek
            $resize_config['master_dim'] = ($dim > 0) ? "width" : "height"; //sisi terpanjang

            $ci->load->library('image_lib', $resize_config);
            $ci->image_lib->clear();
            $ci->image_lib->initialize($resize_config);

            if (@$ci->image_lib->resize()) {
                $no_error_resize = true;
            } else {
                $no_error_resize = false;
            }
        }

        $no_error_crop = true;
        if ($crop_width > -1 && $crop_height > -1) {
            //CROP IMAGE
            $upload_data = $ci->upload->data();
            $crop_config['image_library'] = 'gd2';
            $crop_config['source_image'] = $ci->upload->upload_path . $ci->upload->file_name;
            $crop_config['new_image'] = $path . $ci->config->item('thumbnail_marker') . $filename;
            $crop_config['quality'] = "100%";
            $crop_config['maintain_ratio'] = FALSE;
            if ($crop_width <= 1 && $crop_height <= 1) {
                $crop_config['width'] = $image_size[0] * $crop_width;
                $crop_config['height'] = $image_size[1] * $crop_height;
                $crop_config['x_axis'] = $image_size[0] * $crop_width / 2; //crop center x axis
                $crop_config['y_axis'] = $image_size[1] * $crop_height / 2; //crop center y axis
            } else {
                $crop_config['width'] = $crop_width;
                $crop_config['height'] = $crop_height;
            }

            $ci->load->library('image_lib', $resize_config);
            $ci->image_lib->clear();
            $ci->image_lib->initialize($crop_config);

            if (@$ci->image_lib->crop()) {
                $no_error_crop = true;
            } else {
                $no_error_crop = false;
            }
        }

        if ($no_error_resize && $no_error_crop) {
            $no_error = true;
        } else {
            $no_error = false;
        }
    } else {
        $no_error = false;
    }

    $image_upload_result = array(
        'result' => $no_error,
        'errors' => $ci->upload->display_errors(),
    );
    return $image_upload_result;
}

function backup_image_upload_thumbnail($filename, $path, $image_field_name, $resize_width = 0, $resize_height = 0, $crop_width = 0, $crop_height = 0) {
    $ci = & get_instance();

    $upload_config['file_name'] = $filename;
    $upload_config['upload_path'] = $path;
    $upload_config['allowed_types'] = $ci->config->item('allowed_types'); //  config/image.php 
    $upload_config['overwrite'] = TRUE;

    $ci->load->library('upload');
    $ci->upload->initialize($upload_config);

    $no_error = false;
    if ($ci->upload->do_upload($image_field_name)) {
        $no_error = true;
        //default tidak boleh 0 karena 0 berarti tidak di resize, tetapi tetap harus bisa crop
        if ($resize_width > -1 && $resize_height > -1) {
            $no_error = true;

            $real_file = realpath($path) . "/" . $ci->upload->file_name;
            $image_size = getimagesize($real_file);

            //RESIZE IMAGE
            $upload_data = $ci->upload->data();
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = $ci->upload->upload_path . $ci->upload->file_name;
            $resize_config['new_image'] = $path;
            $resize_config['create_thumb'] = FALSE;
            $resize_config['maintain_ratio'] = TRUE;
            //ALGORITMA CARI PEMBAGIAN TERKECIL
            if ($resize_width < 1 && $resize_height < 1) {
                $resize_config['width'] = $image_size[0] / 2;
                $resize_config['height'] = $image_size[1] / 2;
            } else {
                $resize_config['width'] = $resize_width;
                $resize_config['height'] = $resize_height;
            }
            $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($resize_config['width'] / $resize_config['height']);
            //$resize_config['master_dim'] = ($dim > 0) ? "height" : "width"; //sisi terpendek
            $resize_config['master_dim'] = ($dim > 0) ? "width" : "height"; //sisi terpanjang

            $ci->load->library('image_lib', $resize_config);
            $ci->image_lib->clear();
            $ci->image_lib->initialize($resize_config);

            if (@$ci->image_lib->resize()) {
                $no_error = true;
                //CROP IMAGE
                $upload_data = $ci->upload->data();
                $crop_config['image_library'] = 'gd2';
                $crop_config['source_image'] = $ci->upload->upload_path . $ci->upload->file_name;
                $crop_config['new_image'] = $path . $ci->config->item('thumbnail_marker') . $filename;
                $crop_config['quality'] = "100%";
                $crop_config['maintain_ratio'] = FALSE;
                if ($crop_width == "0.5" && $crop_height == "0.5") {
                    $crop_config['width'] = $image_size[0] / 2;
                    $crop_config['height'] = $image_size[1] / 2;
                } else {
                    $crop_config['width'] = $crop_width;
                    $crop_config['height'] = $crop_height;
                }
                $crop_config['x_axis'] = $image_size[0] / 2; //crop center x axis
                $crop_config['y_axis'] = $image_size[1] / 2; //crop center y axis

                $ci->image_lib->clear();
                $ci->image_lib->initialize($crop_config);

                if ($crop_width != "0" && $crop_height != "0") {
                    if (@$ci->image_lib->crop()) {
                        $no_error = true;
                    } else {
                        $no_error = false;
                    }
                }
            } else {
                $no_error = false;
            }
        }
    } else {
        $no_error = false;
    }

    $image_upload_result = array(
        'result' => $no_error,
        'errors' => $ci->upload->display_errors(),
    );
    return $image_upload_result;
}

function image_upload($filename, $path, $image_field_name) {
    $ci = & get_instance();

    $upload_config['file_name'] = $filename;
    $upload_config['upload_path'] = $path;
    $upload_config['allowed_types'] = $ci->config->item('allowed_types'); //  config/image.php 
    $upload_config['overwrite'] = TRUE;

    $ci->load->library('upload');
    $ci->upload->initialize($upload_config);

    $no_error = false;
    if ($ci->upload->do_upload($image_field_name)) {
        $no_error = true;
    }
    $image_upload_result = array(
        'result' => $no_error,
        'errors' => $ci->upload->display_errors(),
    );
    return $image_upload_result;
}

function image_upload_resize($filename, $path, $image_field_name, $resize_width = -1, $resize_height = -1, $crop_width = -1, $crop_height = -1) {
    $ci = & get_instance();

    $upload_config['file_name'] = $filename;
    $upload_config['upload_path'] = $path;
    $upload_config['allowed_types'] = $ci->config->item('allowed_types'); //  config/image.php 
    $upload_config['overwrite'] = TRUE;

    $ci->load->library('upload');
    $ci->upload->initialize($upload_config);
    $no_error = false;
    if ($ci->upload->do_upload($image_field_name)) {
        $no_error = true;

        $real_file = realpath($path) . "/" . $ci->upload->file_name;
        $image_size = getimagesize($real_file);

        $no_error_resize = true;
        //default tidak boleh 0 karena 0 berarti tidak di resize, tetapi tetap harus bisa crop
        if ($resize_width > -1 && $resize_height > -1) {
            //RESIZE IMAGE
            $upload_data = $ci->upload->data();
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = $ci->upload->upload_path . $ci->upload->file_name;
            $resize_config['new_image'] = $path;
            $resize_config['create_thumb'] = FALSE;
            $resize_config['maintain_ratio'] = TRUE;
            //ALGORITMA CARI PEMBAGIAN TERKECIL
            if ($resize_width <= 1 && $resize_height <= 1) {
                $resize_config['width'] = $image_size[0] * $resize_width;
                $resize_config['height'] = $image_size[1] * $resize_height;
            } else {
                $resize_config['width'] = $resize_width;
                $resize_config['height'] = $resize_height;
            }
            $dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($resize_config['width'] / $resize_config['height']);
            //$resize_config['master_dim'] = ($dim > 0) ? "height" : "width"; //sisi terpendek
            $resize_config['master_dim'] = ($dim > 0) ? "width" : "height"; //sisi terpanjang

            $ci->load->library('image_lib', $resize_config);
            $ci->image_lib->clear();
            $ci->image_lib->initialize($resize_config);

            if (@$ci->image_lib->resize()) {
                $no_error_resize = true;
            } else {
                $no_error_resize = false;
            }
        }

        if ($no_error_resize) {
            $no_error = true;
        } else {
            $no_error = false;
        }
    } else {
        $no_error = false;
    }

    $image_upload_result = array(
        'result' => $no_error,
        'errors' => $ci->upload->display_errors(),
    );
    return $image_upload_result;
}

function create_thumbnail($file_name, $path, $size = array('width' => 50, 'heigth' => 50), $identifier, $new_identifier) {
    $ci = & get_instance();
    $config = array(
        'image_library' => 'gd2',
//      'create_thumb' => TRUE,
        'source_image' => $path . '/' . $file_name,
        'maintain_ratio' => FALSE,
        'width' => $size['width'],
        'height' => $size['height'],
        'new_image' => $path . '/' . str_replace($identifier, $new_identifier, $file_name)
    );
    $ci->load->library('image_lib', $config);
    $ci->image_lib->initialize($config);
    if (!$ci->image_lib->resize()) {
        return $ci->image_lib->display_errors();
    }
    $ci->image_lib->clear();
    return true;
}