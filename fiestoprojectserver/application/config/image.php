<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
$config['default_image_url'] = "images/";
$config['default_no_image'] = 'images/noimage.png';

$config['thumbnail_marker'] = 'thumb_';
$config['allowed_types'] = 'jpeg|jpg|png|gif|pdf';

/*
 * diset 100mb / 100k px karena somehow gak bisa diset -1 / 0 (unlimited)
 */
$config['max_allow_width'] = '100000';
$config['max_allow_height'] = '100000';
$config['max_allow_file_size'] = '100000000'; // bytes

$config['thumbnail_width'] = '200';
$config['thumbnail_height'] = '200';
/* 
 * width & height use percentage if value is under 1, and pixels if value is more than 1 
 */
$config['resize_width'] = '0.3';
$config['resize_height'] = '0.3';
$config['crop_width'] = '-1';
$config['crop_height'] = '-1';


$config['default_base_image_folder_url']  = "./";
$config['default_user_image_url'] = "photos/users/";