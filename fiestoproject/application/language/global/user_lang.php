<?php

$ci = & get_instance();
$counter = 1;
$module = "user";
$data_type = "system_modules"; //system_modules OR transaction_modules OR master_modules (check in modules_lang)
$code = $ci->lang->line($data_type)[$module]['code'] . $ci->config->item('custom_code_suffix');

$lang['notification_user_cant_delete_super_admin'] = "Role 'super administrator' tidak dapat dihapus!" . lang_code_generator($code, $counter++);
$lang['notification_user_default_characters_forbidden'] = "Username hanya boleh menggunakan [A-Z][a-z][0-9]!" . lang_code_generator($code, $counter++);
$lang['notification_user_already_exist'] = "Username sudah terpakai! Harap menggunakan username lainnya! " . lang_code_generator($code, $counter++);
