<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* ----- REQUIRED ----- */
$config['default_new_user_password'] = 'admin';
$config['custom_code_suffix'] = 'c';
$config['max_length_integer_adjustment'] = '3';
$config['max_length_decimal_adjustment'] = '3';
/* ----- REQUIRED ----- */

/* ----- DEFAULT APPLICATION OPTION----- */
$config['max_web_slider_allowed'] = "5";
$config['user_default'] = "1";
$config['role_default'] = "1";
$config['forbidden_username'] = array("admin", "superadmin", "backup", "test", "tester");
$config['default_username'] = "admin"; /* do not change! */
$config['session_banned_pages'] = "banned_pages"; /* do not change! */
$config['default_date_format'] = 'dd-mm-yyyy';
$config['default_blank_date'] = '0000-00-00';
$config['default_blank_datetime'] = '0000-00-00 00:00:00';
$config['default_date'] = '1970-01-01';
$config['default_extension'] = '.png';
$config['currency'] = 'Rp.';
$config['id_guest'] = '1';
$config['default_nominal'] = '0';
$config['default_integer_size'] = pow(10, 11);
$config['default_integer_size_minus_1'] = pow(10, 11) - 1;
$config['default_big_integer_size'] = pow(10, 13);
$config['default_big_integer_size_minus_1'] = pow(10, 13) - 1;
$config['default_integer_length'] = 11;
$config['code_pad_length'] = 17;
$config['code_pad_string'] = '0';
$config['blank'] = '(blank)';
$config['default_active'] = 0;
$config['default_inactive'] = 1;
$config['yes'] = 'yes';
$config['no'] = 'no';
$config['checked'] = 'checked="checked"';
$config['male'] = 'male';
$config['female'] = 'female';
$config['required'] = 'required';
$config['default_value'] = array(
    'return' => 0,
    'offset' => 1,
);
$config['available_users_status'] = array('status_active', 'status_pending', 'status_inactive');
$config['max_age_for_birthyear_option'] = 25;
$config['min_age_for_birthyear_option'] = 5;

/* ----- PREFIXES ----- */
$config['prefix_user'] = "USR";
$config['prefix_warehouse'] = "WRH";

/* ----- DEFAULT APPLICATION OPTION----- */


/* ----- SETTING OPTION ----- */
$lang['on'] = 'On';
$lang['off'] = 'Off';

/* ----- SYSTEM OPTION ----- */
$config['default'] = 'default';
$config['info'] = 'info';
$config['success'] = 'success';
$config['error'] = 'danger';
$config['warning'] = 'warning';

/* ----- FORM AUTHORIZATION & RESTRICTION OPTION ----- */
$config['manage'] = 'manage';
$config['change_password'] = 'change_password';
$config['update_profile'] = 'update_profile';

$config['list'] = 'list';
$config['add'] = 'add';
$config['edit'] = 'edit';
$config['superedit'] = 'superedit';
$config['delete'] = 'delete';
$config['cancel'] = 'cancel';
$config['view'] = 'view';
$config['pay'] = 'pay';
$config['pay_delete'] = 'pay_delete';
$config['close'] = 'close';
$config['open'] = 'open';

$config['permission'] = 'permission';

$config['dashboard'] = 'dashboard';
$config['report'] = 'report';

$config['login'] = 'login'; //used for logging
$config['user'] = 'User'; //used for logging

$config['auto_populate_combobox'] = array("edit", "process");

/* ----- VISIBILITY OPTION ----- */
$config['visibility_desktop'] = 'desktop';
$config['visibility_tablet'] = 'tablet';
$config['visibility_all_device'] = 'all_device';

/* ----- FIELD TYPE OPTION ----- */
$config['form_textfield'] = 'textfield';
$config['form_datefield'] = 'datefield';
$config['form_numberfield'] = 'numberfield';
$config['form_decimalfield'] = 'decimalfield';
$config['form_textarea'] = 'textarea';
$config['form_combobox'] = 'combobox';
$config['form_label'] = 'label';
$config['form_combobox_multiple'] = 'combobox_multiple';
$config['form_image'] = 'image';
$config['form_radio'] = 'radio';
$config['form_checkbox'] = 'checkbox';
$config['form_file'] = 'file';
$config['form_password'] = 'password';

$config['form_default_min_length'] = array(
    'textfield' => 1,
    'combobox' => 0,
    'textarea' => 0,
    'image' => 0,
    'radio' => 0,
    'checkbox' => 0,
    'combobox_multiple' => 0,
    'datefield' => 0,
    'label' => 0,
);
$config['form_default_max_length'] = array(
    'textfield' => 50,
    'combobox' => 0,
    'textarea' => 150,
    'image' => 0,
    'radio' => 0,
    'checkbox' => 0,
    'combobox_multiple' => 0,
    'datefield' => 10,
    'label' => 0,
);

/* ----- SALE OPTION ----- */
$config['action_open'] = "action_open";
$config['action_modal'] = "action_modal";

/* ----- SALE OPTION ----- */
$config['status_blank'] = "status_blank";
$config['status_recent'] = "status_recent";
$config['status_open'] = "status_open";
$config['status_closed'] = "status_closed";
$config['status_cleared'] = "status_cleared";
$config['status_cancelled'] = "status_cancelled";
$config['status_pending'] = "status_pending";
$config['status_inactive'] = "status_inactive";
$config['status_active'] = "status_active";
$config['status_all'] = "status_all";

/* ----- CASHFLOW OPTION ----- */
$config['expense'] = "expense";
$config['income'] = "income";

/* ----- GENDER OPTION ----- */
$config['male'] = "male";
$config['female'] = "female";
$config['gender_options'] = array(
    'M' => 'gender_male',
    'F' => 'gender_female'
);

/* ----- GENDER OPTION / TOURNAMENT CATEGORY ----- */
$config['tournament_gender_category'] = array(
    'M' => 'male',
    'F' => 'female',
    'X' => 'mix'
);

/* ----- OFFICIAL - LICENSE TYPE ----- */
$config['license_type'] = array(
    'a' => 'a',
    'b' => 'b',
    'c' => 'c'
);

/* ----- TOURNAMENT STATUS ----- */
$config['tournament_status'] = array(
    'status_ongoing' => 'status_ongoing',
    'status_finished' => 'status_finished',
);

/* ----- DAYS ----- */
$config['days'] = array(
    array(
        'id' => "1",
        'day' => "Senin"
    ), array(
        'id' => "2",
        'day' => "Selasa"
    ), array(
        'id' => "3",
        'day' => "Rabu"
    ), array(
        'id' => "4",
        'day' => "Kamis"
    ), array(
        'id' => "5",
        'day' => "Jumat"
    ), array(
        'id' => "6",
        'day' => "Sabtu"
    ), array(
        'id' => "7",
        'day' => "Minggu"
    )
);

/* ----- ROLE TYPE OPTION ----- */
$config['lpb_date'] = "lpb_date";
$config['warranty_expiration_date'] = "warranty_expiration_date";

/* ----- ROLE TYPE OPTION ----- */
$config['role_superadmin'] = '1';
$config['role_supervisor'] = '2';
$config['role_employee'] = '3';

/* ----- BACKEND PATH ----- */
$config['backend'] = "backend/";
/* ----- BACKEND PATH ----- */

/* ----- BACKUP-RESTORE ----- */
$config['auto_backup_path'] = "automation/auto_backup/";
$config['backup_path'] = "downloads/backup/";
$config['restore_path'] = "downloads/restore/";
$config['backuprestore_name'] = "aindo";
/* ----- BACKUP-RESTORE ----- */

/* ----- THEME COLOR PAGE ----- */
/* BLUE-GREEN */
//$config['background_color'] = "linear-gradient(to left, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%)";
/* BLUE-GREEN v2 */
//$config['background_color'] = "linear-gradient(to left, #43cea2, #185a9d)";
/* BLUE-GREEN v3 */
//$config['background_color'] = "linear-gradient(to left, #136a8a, #267871)";
/* BLUE-PURPLE */
//$config['background_color'] = "linear-gradient(to left, #83a4d4 , #b6fbff)";
/* BLUE-GRAY */
//$config['background_color'] = "linear-gradient(to left, #525252 , #3d72b4)";
/* GRAY-WHITE */
//$config['background_color'] = "linear-gradient(to left, #8e9eab, #eef2f3)";
/* PINK-ORANGE */
//$config['background_color'] = "linear-gradient(to left, #D38312 , #A83279)";
/* BROWN-DARK BROWN */
//$config['background_color'] = "linear-gradient(to left, #1e130c , #9a8478)";
/* GREEN-YELLOW */
//$config['background_color'] = "linear-gradient(to left, #add100 , #7b920a)";
/* YELLOW-ORANGE */
//$config['background_color'] = "linear-gradient(to left, #ff4e50 , #f9d423)";
/* BROWN-GRAY */
//$config['background_color'] = "linear-gradient(to left, #304352, #d7d2cc)";
/* BLUE-DARK BLUE */
//$config['background_color'] = "linear-gradient(to left, #26a0da, #314755)";
/* GRAY-DARK GRAY */
//$config['background_color'] = "linear-gradient(to left, #bdc3c7, #2c3e50)";
/* GRAY-DARK GRAY v2 */
//$config['background_color'] = "linear-gradient(to left, #757f9a, #d7dde8)";
/* RED-ORANGE */
//$config['background_color'] = "linear-gradient(to left, #cb2d3e, #ef473a)";
/* RED-BLACK */
//$config['background_color'] = "linear-gradient(to left, #870000, #190a05)";
/* ----- THEME COLOR PAGE ----- */

/* ----- REQUIRED CSS ----- */
$config['validation_required'] = ' <span class="text-danger">*</span>';
$config['validation_standard'] = "trim";
/*----- REQUIRED CSS -----*/
