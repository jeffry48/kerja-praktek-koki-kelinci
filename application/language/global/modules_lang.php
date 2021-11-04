<?php

$ci = & get_instance();
$lang['format_module_add'] = "Tambah %s";
$lang['format_module_edit'] = "Ubah %s";
$lang['format_module_invite'] = "Undang %s";
$lang['format_module_view'] = "Lihat %s";
$lang['format_module_data_not_found'] = "%s bersangkutan tidak dapat ditemukan!";
$lang['format_module_edit_forbidden'] = "%s bersangkutan tidak boleh diubah!";
$lang['format_module_delete_forbidden'] = "%s bersangkutan tidak boleh dihapus!";
$lang['format_module_insert_forbidden'] = "%s bersangkutan tidak boleh dipergunakan!";

$lang['module_name'] = array(
    array(
        "title" => "dashboard",
        "code" => "M000",
        "icon" => "fa fa-home",
        "name" => "modules",
    ),
    array(
        "title" => "user",
        "code" => "S100",
        "icon" => "fa fa-users",
        "name" => "modules",
    ),
    array(
        "title" => "department",
        "code" => "S100",
        "icon" => "fa fa-home",
        "name" => "modules",
    ),
);

foreach ($lang['module_name'] as $module_pack) {
    $module_name = $module_pack['name'];
    if (isset($module_pack['data']) && count($module_pack['data']) > 0) {
        $single_module = $module_pack['data'];
        foreach ($single_module as $module => $single) {
            $counter = 1;
            $data_type = $module_name;
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
    } else {
        $counter = 1;
        $data_type = $module_name;
        $code = $module_pack['code'];
        $module = $module_pack['title'];
        $translation = $ci->lang->line("label_" . $module);
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
$lang['navigation_change_password'] = "Ubah Password";
$lang['navigation_logout'] = "Log Out";
$lang['navigation_log'] = "Log";
$lang['navigation_profile'] = "Profil";
$lang['navigation_invitation'] = "Undangan";
$lang['navigation_verification'] = "Verifikasi";
$lang['navigation_update_profile'] = "Update Profil";
$lang['notification_login_wrong_username_password'] = "Pastikan username dan password anda sudah benar! [CODE S100-001]";
$lang['notification_change_password_old_password_mismatch'] = "Password salah! Pastikan password yang anda masukan benar! [CODE S100-002]";
$lang['notification_change_password_new_password_mismatch'] = "Konfirmasi password baru tidak cocok dengan password baru! [CODE S100-003]";
$lang['notification_change_password_admin_not_allowed'] = "Password untuk username 'admin' tidak diperbolehkan untuk diubah! [CODE S100-004]";
$lang['notification_new_password_mismatch'] = "Konfirmasi password tidak cocok dengan password! [CODE S100-005]";
$lang['notification_verification_username_not_found'] = "Username tidak ditemukan! [CODE S100-006]";
$lang['notification_verification_user_is_banned'] = "Akun anda telah dinon-aktifkan! Silahkan hubungi Admin. [CODE S100-007]";
$lang['notification_verification_user_is_already_verified'] = "Akun anda sudah terverifikasi!. [CODE S100-008]";
$lang['notification_user_is_already_exist'] = "Username sudah ada! [CODE S100-009]";
$lang['notification_user_default_characters_forbidden'] = "Username hanya boleh menggunakan [A-Z][a-z][0-9]! [CODE S100-010]";
$lang['label_login_club'] = "Login Klub";
$lang['label_login_student'] = "Login Atlet";
$lang['label_login_niku'] = "Turnamen";
$lang['label_login_committee'] = "Login Panitia";

/* --- S000-xxx: system --- */
$lang['notification_no_data_change'] = "Tidak ada perubahan data yang dilakukan! [CODE S000-100]";
$lang['notification_no_file_to_upload'] = "Tidak ada file yang terpilih! [CODE S000-101]";
$lang['notification_success_add'] = " telah berhasil ditambahkan! [CODE S000-001]";
$lang['notification_success_order'] = " telah berhasil dipesan! [CODE S000-002]";
$lang['notification_success_update'] = " telah berhasil diubah! [CODE S000-003]";
$lang['notification_success_delete'] = " telah berhasil dihapus! [CODE S000-004]";
$lang['notification_success_cancel'] = " telah berhasil dibatalkan! [CODE S000-005]";
$lang['notification_success_close'] = " telah berhasil ditutup! [CODE S000-006]";
$lang['notification_success_unclose'] = " telah berhasil dibuka kembali! [CODE S000-007]";
$lang['notification_success_payment'] = " telah berhasil dibayar! [CODE S000-008]";
$lang['notification_success_activate'] = " telah berhasil diaktivasi! [CODE S000-009]";
$lang['notification_success_verification'] = " telah berhasil diverifikasi! [CODE S000-014]";
$lang['notification_failed_update'] = " gagal diubah! [CODE S000-010]";
$lang['notification_failed_delete'] = " gagal dihapus! [CODE S000-011]";
$lang['notification_failed_add'] = " gagal ditambah! [CODE S000-012]";
$lang['notification_failed_verification'] = " gagal diverifikasi! [CODE S000-013]";
$lang['notification_success_follow'] = " telah berhasil diikuti! [CODE S000-014]";

$lang['notification_success_change_password'] = "Password berhasil diubah! [CODE S000-100]";
$lang['notification_success_backup'] = "Backup data berhasil! [CODE S000-101]";
$lang['notification_success_restore'] = "Restore data berhasil! [CODE S000-102]";
$lang['notification_success_update_profile'] = "Profil berhasil diubah! [CODE S000-200]";
$lang['notification_success_upload'] = "File telah berhasil terupload! [CODE S000-300]";
$lang['notification_success_delete_upload'] = "File telah berhasil dihapus! [CODE S000-301]";


/* --- S001-xxx: backuprestore --- */
$lang['navigation_backup'] = "Backup";
$lang['navigation_backup_restore'] = "Backup Restore";
$lang['notification_backuprestore_restore_failed'] = "Restore Data gagal! Periksa kembali file yang anda masukkan! [CODE S001-001]";
$lang['notification_backuprestore_select_file'] = "Pilihlah file restore terlebih dahulu! [CODE S001-002]";
$lang['notification_backuprestore_wrong_extension'] = "Extension file restore salah! Periksa kembali file yang anda pilih! [CODE S001-003]";

/* --- S999-xxx: system access --- */
$lang['navigation_unauthorized'] = "Unauthorized";
$lang['notification_unauthorized_access'] = "Anda tidak memiliki hak akses terhadap halaman yang anda ingin tuju!<br/>Hubungi <strong>'SYSTEM ADMIN'</strong> untuk mendapatkan informasi lebih lanjut! [CODE S999-001]";
$lang['notification_upload_preview_error'] = "Upload Preview Error!";
$lang['notification_upload_preview_file_size_too_big'] = "Ukuran file yang diupload terlalu besar!";
$lang['notification_upload_preview_dimension_too_big'] = "Dimensi file yang diupload terlalu besar!";
$lang['notification_upload_preview_wrong_file_type'] = "Extension file yang diupload salah!";

/* --- global form --- */
$lang['notification_required_combobox'] = "Field {field} dibutuhkan.";
$lang['notification_empty_table'] = "Data tidak tersedia!";
$lang['notification_not_enough_quantity'] = "not enough quantity!";
$lang['notification_start_date_after_end_date'] = "Tanggal mulai tidak boleh sebelum tanggal selesai!";

/* Common Navigations */
$lang['navigation_application'] = "Aplikasi";
$lang['navigation_mini_menu'] = "Mini Menu";
$lang['navigation_toggle'] = "Toggle navigation";
$lang['navigation_system'] = "Setting";
$lang['navigation_dashboard'] = "Home";
$lang['navigation_master_data'] = "Data Master";
$lang['navigation_operational'] = "Operasional";
$lang['navigation_course'] = "Kursus";
$lang['navigation_transaction'] = "Transaksi";
$lang['navigation_coa'] = "Akun";
$lang['navigation_department'] = "Departemen";
$lang['navigation_maintenance_mode'] = "Maintenance Mode";

/* -------------------------------------------------- */
/* -------------------  ACTIONS  -------------------- */
/* -------------------------------------------------- */
$lang['action_activate'] = "Aktivasi";
$lang['action_add'] = "Tambah";
$lang['action_add_detail'] = "Tambah Detail";
$lang['action_add_new'] = "Tambah Baru";
$lang['action_add_new_account'] = "Daftar Baru";
$lang['action_back'] = "Kembali";
$lang['action_cancel'] = "Batal";
$lang['action_change_password'] = "Simpan";
$lang['action_clear'] = "Hapus Semua";
$lang['action_close'] = "Tutup";
$lang['action_delete'] = "Hapus";
$lang['action_edit'] = "Edit";
$lang['action_forgot_password'] = "Lupa Password";
$lang['action_invite'] = "Undang";
$lang['action_login'] = "Login";
$lang['action_maintenance_mode'] = "Turn 'Maintenance Mode' ";
$lang['action_okay'] = "OK";
$lang['action_payment'] = "Bayar";
$lang['action_register'] = "Daftar";
$lang['action_return'] = "Retur";
$lang['action_save'] = "Simpan";
$lang['action_search'] = "Cari";
$lang['action_unclose'] = "Buka Kembali";
$lang['action_update_profile'] = "Ubah Profile";
$lang['action_upload'] = "Upload";
$lang['action_verification'] = "Verifikasi";
$lang['action_view'] = "Lihat";
$lang['action_view_card'] = "Lihat Kartu";

/* -------------------------------------------------- */
/* ----------------  CONFIRMATIONS  ----------------- */
/* -------------------------------------------------- */
$lang['confirmation_delete_title'] = "Konfirmasi Hapus";
$lang['confirmation_delete_message'] = "Apakah anda akan menghapus ";
$lang['confirmation_delete_image_message'] = "Apakah anda akan menghapus gambar di bawah ini?";
$lang['confirmation_delete_document_message'] = "Apakah anda yakin akan menghapus file ini?";
$lang['confirmation_cancel_title'] = "Konfirmasi Batal";
$lang['confirmation_cancel_message'] = "Apakah anda akan membatalkan ";
$lang['confirmation_close_title'] = "Konfirmasi Tutup";
$lang['confirmation_close_message'] = "Apakah anda akan menutup ";
$lang['confirmation_clear_title'] = "Konfirmasi Hapus Semua";
$lang['confirmation_clear_message'] = "Apakah anda akan menghapus semua item?";
$lang['confirmation_unclose_title'] = "Konfirmasi Buka Kembali";
$lang['confirmation_unclose_message'] = "Apakah anda akan membuka kembali ";

/* -------------------------------------------------- */
/* ----------------  INFORMATIONS  ------------------ */
/* -------------------------------------------------- */
$lang['information_username_charactes_allowed'] = "Username hanya dapat menggunakan karakter (a-z) (A-Z) (0-9) (.) (_)";
$lang['information_username_already_used'] = "Username telah digunakan!";
$lang['information_changeable_password'] = "User dapat mengubah password setelah melakukan login!";
$lang['information_backup_suggestion'] = "Untuk menjamin keamanan, simpanlah <strong>HASIL BACKUP</strong> dalam portable drive!";
$lang['information_restore_suggestion'] = "Untuk menjamin keamanan, pastikan anda sudah melakukan <strong>BACKUP</strong> terlebih dahulu <strong>SEBELUM</strong> anda melakukan <strong>RESTORE</strong>!";
$lang['information_maintenance_mode'] = "Jangan lupa untuk me-non-aktifkan maintenance mode setelah proses maintenance selesai dilakukan!";
$lang['information_maintenance_mode_on'] = "Maintenance mode dalam kondisi <span class='text-danger'>ON</span>!";
$lang['information_maintenance_mode_off'] = "Maintenance mode dalam kondisi <span class='text-primary'>OFF</span>!";
$lang['information_file_size_exceeded'] = "Ukuran file melebihi batas maksimal";

$lang['information_file_partial_uploaded'] = "File hanya terupload sebagian.";
$lang['information_file_not_found'] = "File tidak ditemukan.";
$lang['information_your_uploaded_file'] = "File yang anda upload adalah ";
$lang['information_file_size_uploaded'] = "Ukuran file yang anda upload adalah ";
$lang['information_max_allow_file_size'] = "Maksimum ukuran file yang diperbolehkan adalah ";
$lang['information_dimension_uploaded'] = "Dimensi file yang anda upload adalah ";
$lang['information_max_allow_dimension'] = "Maksimum dimensi file yang diperbolehkan adalah ";
$lang['information_upload_allowed_types'] = "Tipe file yang diperbolehkan adalah ";
$lang['information_check_permission'] = "Cek permission destinasi upload.";
$lang['information_delete_upload_error'] = "File tidak berhasil terhapus.";
