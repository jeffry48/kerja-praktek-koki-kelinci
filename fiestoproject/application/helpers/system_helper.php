<?php

function quantity_updater($id, $database_model, $database_quantity, $post_quantity, $is_plus, $title = "") {
    /*
     * $is_plus = true >>> penjumlahan; 
     * $is_plus = false >>> pengurangan; 
     */
    if ($is_plus) {
        $new_quantity = $database_quantity + $post_quantity;
    } else {
        $new_quantity = $database_quantity - $post_quantity;
    }
    $data_product = array(
        'quantity' => $new_quantity,
    );
    if ($title == "") {
        $database_model->update($id, $data_product, "", false);
    } else {
        $database_model->update($id, $data_product, $title);
    }
}

function get_gender($gender) {
    $ci = & get_instance();
    if ($gender == "M") {
        return $ci->lang->line('label_gender_male');
    } else if ($gender == "F") {
        return $ci->lang->line('label_gender_female');
    } else if ($gender == "X") {
        return $ci->lang->line('label_gender_mix');
    } else {
        return "";
    }
}

function is_superadmin() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_superadmin')) {
        return true;
    } else {
        return false;
    }
}

function is_supervisor() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_supervisor')) {
        return true;
    } else {
        return false;
    }
}

function is_webmember() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_webmember')) {
        return true;
    } else {
        return false;
    }
}

function is_club() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_club')) {
        return true;
    } else {
        return false;
    }
}

function is_niku() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_niku')) {
        return true;
    } else {
        return false;
    }
}

function is_student() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_student')) {
        return true;
    } else {
        return false;
    }
}

function is_committee() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_committee')) {
        return true;
    } else {
        return false;
    }
}