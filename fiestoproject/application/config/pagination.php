<?php

if (!defined('BASEPATH')) {
    exit('Direct Access Not Allowed');
}

$config['default_offset'] = 1;
$config['pagination_limit'] = 50;
$config['per_page'] = $config['pagination_limit'];
$config['num_links'] = 3;
$config['first_url'] = 1;
$config['use_page_numbers'] = TRUE;
$config['first_link'] = '&laquo';
$config['last_link'] = '&raquo';

$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
$config['full_tag_close'] = '</ul></nav></div>';
$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
$config['cur_tag_close'] = '</span></li>';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tagl_close'] = '</li>';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

// end of file Pagination.php 
// Location config/pagination.php 