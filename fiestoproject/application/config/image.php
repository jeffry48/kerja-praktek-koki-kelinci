<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
$config['default_image_url'] = "images/";
$config['default_no_image'] = 'images/noimage.png';
$config['default_tim'] = 'images/default_basket.png';
$config['default_tournament_poster'] = 'images/default_basket.png';

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
$config['default_club_image_url'] = "photos/clubs/";
$config['default_tournament_image_url'] = "photos/tournaments/";
$config['default_tournament_registration_image_url'] = "photos/tournaments/";
$config['default_user_webmember_image_url'] = "photos/webmembers/";
$config['default_official_image_url'] = "photos/officials/";
$config['default_teacher_image_url'] = "photos/teachers/";
$config['default_athlete_image_url'] = "photos/students/";
$config['default_student_image_url'] = "photos/students/";
$config['default_recruit_image_url'] = "photos/students/";

$config['image_url_tournament_registration'] = "photos/tournament_registration_documents/";
$config['document_type_folder'] = array(
  1 => 'photo',
  2 => 'birth_certificate',
  3 => 'school_degree/elementary',
  4 => 'school_degree/junior',
  5 => 'school_degree/senior',
  6 => 'family_card',
  7 => 'passport',
  8 => 'student_card',
  9 => 'report_card'
);
$config['official_document_type_folder'] = array(
  'photo' => 'photo',
  'license' => 'license',
  'identity_card' => 'identity_card',
);