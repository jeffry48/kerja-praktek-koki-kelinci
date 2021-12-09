<?php

$ci = & get_instance();
$lang['format_module_add'] = "Add %s";
$lang['format_module_edit'] = "Edit %s";
$lang['format_module_view'] = "View %s";
$lang['format_module_data_not_found'] = "%s can not be found!";
$lang['format_module_edit_forbidden'] = "%s can not be editted!";
$lang['format_module_delete_forbidden'] = "%s can not be deleted!";
$lang['format_module_insert_forbidden'] = "%s can not be used!";

$lang['module_name'] = array(
    array(
        "title" => "master_data",
        "data" => array(
            'unit' => array(
                'name' => $ci->lang->line('label_unit'),
                'code' => "M101",
                'active' => "",
                'detail' => array(
                    
                ),
            ),
        )
    ),
    array(
        "title" => "transaction",
        "data" => array(
            'purchase' => array(
                'name' => $ci->lang->line('label_purchase'),
                'code' => "T101",
                'active' => ""
            ),
            'sale' => array(
                'name' => $ci->lang->line('label_sale'),
                'code' => "T102",
                'active' => ""
            ),
        )
    ),
    array(
        "title" => "system",
        "data" => array(
            'user' => array(
                'name' => $ci->lang->line('label_user'),
                'code' => "S101",
                'active' => ""
            ),
        )
    ),
);

foreach ($lang['module_name'] as $module_pack) {
    $modules = $module_pack['data'];
    foreach ($modules as $module => $single) {
        $counter = 1;
        $code = $single['code'];
        $translation = $single['name'];
        $lang['module_' . $module] = $translation;

        $lang['navigation_' . $module] = $translation;
        $lang['navigation_' . $module . '_add'] = sprintf($lang['format_module_add'], $translation);
        $lang['navigation_' . $module . '_edit'] = sprintf($lang['format_module_edit'], $translation);
        $lang['navigation_' . $module . '_view'] = sprintf($lang['format_module_view'], $translation);

        $lang['notification_no_' . $module . '_found'] = sprintf($lang['format_module_data_not_found'], $translation) . lang_code_generator($code, $counter++);
        $lang['notification_' . $module . '_default_edit_forbidden'] = sprintf($lang['format_module_edit_forbidden'], $translation) . lang_code_generator($code, $counter++);
        $lang['notification_' . $module . '_default_delete_forbidden'] = sprintf($lang['format_module_delete_forbidden'], $translation) . lang_code_generator($code, $counter++);
        $lang['notification_' . $module . '_default_insert_forbidden'] = sprintf($lang['format_module_insert_forbidden'], $translation) . lang_code_generator($code, $counter++);
    }
}

/* S100-xxx: login & register */
$lang['notification_login_wrong_username_password'] = "Please check your username and password! [CODE S100-001]";
$lang['notification_change_password_old_password_mismatch'] = "Wrong old password! Please recheck your old password [CODE S100-002]";
$lang['notification_change_password_new_password_mismatch'] = "New password mismatch! [CODE S100-003]";
$lang['notification_change_password_admin_not_allowed'] = "Username 'admin' can not change password! [CODE S100-004]";
$lang['notification_new_password_mismatch'] = "KNew password mismatch! [CODE S100-005]";
$lang['notification_verification_username_not_found'] = "Username not found! [CODE S100-006]";
$lang['notification_user_is_already_exist'] = "Username has already been used! [CODE S100-009]";
$lang['notification_user_default_characters_forbidden'] = "Username can only use [A-Z][a-z][0-9]! [CODE S100-010]";

/* --- S000-xxx: system --- */
$lang['notification_unauthorized_api_access'] = "Unauthorized access! [CODE S000-000]";
$lang['notification_recheck_data'] = "Please recheck your data! [CODE S000-001]";
$lang['notification_no_data_change'] = "No data change! [CODE S000-002]";
$lang['notification_no_file_to_upload'] = "No file to upload! [CODE S000-003]";
$lang['notification_failed_update'] = " failed to update! [CODE S000-004]";
$lang['notification_failed_delete'] = " failed to delete! [CODE S000-005]";
$lang['notification_failed_add'] = " failed to add! [CODE S000-006]";

$lang['notification_success_login'] = "Login success! [CODE S100-000]";
$lang['notification_success_change_password'] = "Change password success! [CODE S100-100]";
$lang['notification_success_add'] = " successfully added! [CODE S100-001]";
$lang['notification_success_order'] = " successfully ordered! [CODE S100-002]";
$lang['notification_success_update'] = " successfully edited! [CODE S100-003]";
$lang['notification_success_delete'] = " successfully deleted! [CODE S100-004]";
$lang['notification_success_cancel'] = " successfully cancelled! [CODE S100-005]";
$lang['notification_success_close'] = " successfully closed! [CODE S100-006]";
$lang['notification_success_open'] = " successfully opened! [CODE S100-007]";
$lang['notification_success_pay'] = " successfully paid! [CODE S100-008]";
$lang['notification_success_upload'] = "File upload success! [CODE S100-009]";
$lang['notification_success_delete_upload'] = "File has been successfully deleted! [CODE S100-010]";
$lang['notification_success_backup'] = "Backup success! [CODE S100-101]";
$lang['notification_success_restore'] = "Restore success! [CODE S100-102]";

/* --- S001-xxx: backuprestore --- */
$lang['navigation_backup'] = "Backup";
$lang['navigation_backup_restore'] = "Backup Restore";
$lang['notification_backuprestore_restore_failed'] = "Restore failed! Please recheck your file! [CODE S001-001]";
$lang['notification_backuprestore_select_file'] = "Choose restore file first! [CODE S001-002]";
$lang['notification_backuprestore_wrong_extension'] = "Warong restore file extension! Please recheck your file! [CODE S001-003]";

/* --- S999-xxx: system access --- */
$lang['navigation_unauthorized'] = "Unauthorized";
$lang['notification_unauthorized_access'] = "You don't have access to this page!<br/>Please inform '<strong>CURRENT MANAGER</strong>' for more information! [CODE S999-001]";
$lang['notification_upload_preview_error'] = "Upload Preview Error!";
$lang['notification_upload_preview_file_size_too_big'] = "File size is too big!";
$lang['notification_upload_preview_dimension_too_big'] = "Dimension is too big!";
$lang['notification_upload_preview_wrong_file_type'] = "Wrong file extension!";

/* --- global form --- */
$lang['notification_required_combobox'] = "Field {field} is required.";
$lang['notification_error_field_required'] = "{field} is required.";
$lang['notification_error_negative_not_allowed'] = "{field} contains negative value.";
$lang['notification_error_positive_integer'] = "{field} must be more than zero.";
$lang['notification_empty_table'] = "Data is not available!";
$lang['notification_error_not_enough_quantity'] = "Not enough detail quantity!";
$lang['notification_error_no_item'] = "No item found!";
$lang['notification_error_add_item_first'] = "No item found! You have to add (+) more item first!";
$lang['notification_error_detail_added'] = "Detail already added!";
$lang['notification_start_date_after_end_date'] = "Start date must be earlier than end date!";
$lang['notification_no_amount'] = "No amount entered!";
$lang['notification_amount_higher_than_remaining'] = "Payment amount is higher than remaining amount!";


/* Common Navigations */
$lang['navigation_application'] = "Application";
$lang['navigation_mini_menu'] = "Mini Menu";
$lang['navigation_toggle'] = "Toggle navigation";
$lang['navigation_system'] = "Setting";
$lang['navigation_report'] = "Report";
$lang['navigation_dashboard'] = "Home";
$lang['navigation_master_data'] = "Master Data";
$lang['navigation_operational'] = "Operational";
$lang['navigation_transaction'] = "Transaction";
$lang['navigation_maintenance_mode'] = "Maintenance Mode";
$lang['navigation_hsg'] = "HSG";
$lang['navigation_isg'] = "ISG";
$lang['navigation_gnr'] = "GNR";


/* -------------------------------------------------- */
/* -------------------  ACTIONS  -------------------- */
/* -------------------------------------------------- */
$lang['action_add'] = "Add";
$lang['action_add_detail'] = "+";
$lang['action_add_new'] = "Add New";
$lang['action_back'] = "Back";
$lang['action_cancel'] = "Cancel";
$lang['action_change_password'] = "Save";
$lang['action_clear'] = "Clear";
$lang['action_close'] = "Close";
$lang['action_delete'] = "Delete";
$lang['action_pay_delete'] = "Delete";
$lang['action_edit'] = "Edit";
$lang['action_forgot_password'] = "Forgot Password";
$lang['action_login'] = "Login";
$lang['action_maintenance_mode'] = "Turn 'Maintenance Mode' ";
$lang['action_okay'] = "OK";
$lang['action_open'] = "Open";
$lang['action_pay'] = "Pay";
$lang['action_search'] = "Search";
$lang['action_view'] = "View";

/* -------------------------------------------------- */
/* ----------------  CONFIRMATIONS  ----------------- */
/* -------------------------------------------------- */
$lang['confirmation_action_title'] = "Confirmation [action]";
$lang['confirmation_action_message'] = "Do you want to [action] <b class='text-danger'>'[item]'</b>?";

/* -------------------------------------------------- */
/* ----------------  INFORMATIONS  ------------------ */
/* -------------------------------------------------- */
$lang['information_username_charactes_allowed'] = "Username can only use (a-z) (A-Z) (0-9) (.) (_)";
$lang['information_username_already_used'] = "Username has been used!";
$lang['information_name_already_used'] = "Name has been used!";
$lang['information_changeable_password'] = "User can change password after login!";
$lang['information_backup_suggestion'] = "For safety, please <strong>SAVE BACKUP FILE</strong> into portable drive!";
$lang['information_restore_suggestion'] = "For safety, please <strong>BACKUP</strong> first <strong>BEFORE</strong> doing <strong>RESTORE</strong>!";
$lang['information_maintenance_mode'] = "Don't forget to turn maintenance off after doing maintenance";
$lang['information_maintenance_mode_on'] = "Maintenance mode is <span class='text-danger'>ON</span>!";
$lang['information_maintenance_mode_off'] = "Maintenance mode is <span class='text-primary'>OFF</span>!";
$lang['information_file_size_exceeded'] = "File size exceeded limit!";

$lang['information_file_partial_uploaded'] = "File only partially uploaded.";
$lang['information_file_not_found'] = "File not found.";
$lang['information_your_uploaded_file'] = "Your uploaded file is ";
$lang['information_file_size_uploaded'] = "Your uploaded file size is ";
$lang['information_max_allow_file_size'] = "Maximum file size allowed is ";
$lang['information_dimension_uploaded'] = "Your uploaded dimension is ";
$lang['information_max_allow_dimension'] = "Maximum allowed dimension is  ";
$lang['information_upload_allowed_types'] = "Allowed file types are ";
$lang['information_check_permission'] = "Check folder destination's permission.";
$lang['information_delete_upload_error'] = "Failed to delete file.";
