<?php
function created_authorship($data) {
    $today = inv_get_current_datetime_db();
    $session_data = api_get_authorization();
    if (isset($session_data['username'])) {
        $data['created_by'] = $session_data['username'];
    } else {
        $data['created_by'] = "system";
    }
    $data['created_date'] = $today;
    return $data;
}

function modified_authorship($data) {
    $today = inv_get_current_datetime_db();
    $session_data = api_get_authorization();
    if (isset($session_data['username'])) {
        $data['modified_by'] = $session_data['username'];
    } else {
        $data['modified_by'] = "system";
    }
    $data['modified_date'] = $today;
    return $data;
}

function deleted_authorship($data) {
    $today = inv_get_current_datetime_db();
    $session_data = api_get_authorization();
    $data['deleted'] = 1;
    $data['deleted_by'] = $session_data['username'];
    $data['deleted_date'] = $today;
    return $data;
}

function get_query_column_max_length($table_name, $column_name) {
    $ci = & get_instance();
    $database_name = $ci->db->database;
    return "SELECT DATA_TYPE, COLUMN_TYPE 
            FROM information_schema.columns
            WHERE 
                table_schema = '$database_name' 
                AND
                table_name = '$table_name' 
                AND
                COLUMN_NAME = '$column_name'";
}

function build_get_num_rows_query($string) {
    return preg_replace('/SELECT[\s\S]+?FROM/', 'SELECT count(*) as total_rows FROM', $string);
}

function get_query_my_num_rows($table_name) {
    return "SELECT count(*) as total_rows FROM " . $table_name . " WHERE deleted = 0 ";
}

function get_my_num_rows_generic($query) {
    if ($query != "") {
        $query = explode("FROM", $query);
        $get_num_rows_query = "SELECT count(*) as total_rows FROM " . $query[1];
    } else {
        $get_num_rows_query = "";
    }
    return $get_num_rows_query;
}

function get_my_num_rows($query) {
    if ($query != "") {
        $query = explode("FROM", $query);
        $get_num_rows_query = "SELECT count(*) as total_rows FROM " . $query[0] . " WHERE ";
    } else {
        $get_num_rows_query = "";
    }
    return $get_num_rows_query;
}

function my_get_all($sql_query, $offset_value = -1) {
    $ci = & get_instance();
    $limit_value = $ci->config->item('pagination_limit');
    if ($offset_value > 0) {
        $offset_value = ($offset_value - 1) * $limit_value;
        $limit = " LIMIT $offset_value, $limit_value";
    } else if ($offset_value == 0) {
        $limit = " LIMIT $offset_value, $limit_value";
    } else {
        $limit = "";
    }
    $query = $ci->db->query("$sql_query $limit");
    return $query->result_array();
}

function my_get_single_by_field($sql_query, $id, $field) {
    $ci = & get_instance();
    $additional_where = " AND $field = '$id'";
    $query = $ci->db->query($sql_query . $additional_where);
    return $query->row_array();
}

function my_get_all_result($sql_query) {
    $ci = & get_instance();
    $query = $ci->db->query($sql_query);
    return $query->result_array();
}

function my_regular_query($sql_query) {
    $ci = & get_instance();
    return $ci->db->query($sql_query);
}

function my_get_row_result($sql_query) {
    $ci = & get_instance();
    $query = $ci->db->query($sql_query);
    return $query->row_array();
}

function my_get_num_rows($sql_query) {
    $ci = & get_instance();
    $query = $ci->db->query($sql_query);
    $result = $query->row_array();
    return $result['total_rows'];
}

function my_get_auto_increment_value($table_name) {
    $ci = & get_instance();
    $query = $ci->db->query("SHOW TABLE STATUS LIKE '$table_name'");
    $results = $query->result_array();
    return $results[0]['Auto_increment'];
}

function my_insert($table_name, $data, $title, $insert_public_log = true) {
    $ci = & get_instance();
    if (!$ci->config->item('force_demo')) {
        $data = created_authorship($data);
        $data = modified_authorship($data);
        $ci->db->insert($table_name, $data);
        $id = $ci->db->insert_id();
        $system_log_message = $ci->db->last_query();
        //$public_log_message = $ci->config->item('user') . " '" . $data['created_by'] . "' " . $ci->config->item('add') . " " . $title . " @ " . inv_datetime_format_view($data['created_date']);
        $public_log_message = public_log_generator($data['created_by'], $ci->config->item('add'), $title, $data['created_date']);
        if ($insert_public_log) {
            invento_log($system_log_message, $public_log_message);
        } else {
            invento_system_log($system_log_message);
        }
    } else {
        $id = 0;
    }
    return (isset($id)) ? $id : FALSE;
}

function my_update($table_name, $id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
    $ci = & get_instance();
    if (!$ci->config->item('force_demo')) {
        $data = modified_authorship($data);
        $ci->db->where($id_field_override, $id);
        $id = $ci->db->update($table_name, $data);
        $system_log_message = $ci->db->last_query();
        //$public_log_message = $ci->config->item('user') . " '" . $data['modified_by'] . "' " . $ci->config->item('edit') . " " . $title . " @ " . inv_datetime_format_view($data['modified_date']);
        $public_log_message = public_log_generator($data['modified_by'], $ci->config->item('edit'), $title, $data['modified_date']);
        if ($insert_public_log) {
            invento_log($system_log_message, $public_log_message);
        } else {
            invento_system_log($system_log_message);
        }
    } else {
        $id = 0;
    }
    return (isset($id)) ? $id : FALSE;
}

function my_delete($table_name, $id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
    $ci = & get_instance();
    if (!$ci->config->item('force_demo')) {
        $data = deleted_authorship($data);
        $ci->db->where($id_field_override, $id);
        $id = $ci->db->update($table_name, $data);
        $system_log_message = $ci->db->last_query();
        //$public_log_message = $ci->config->item('user') . " '" . $data['deleted_by'] . "' " . $ci->config->item('delete') . " " . $title . " @ " . inv_datetime_format_view($data['deleted_date']);
        $public_log_message = public_log_generator($data['deleted_by'], $ci->config->item('delete'), $title, $data['deleted_date']);
        if ($insert_public_log) {
            invento_log($system_log_message, $public_log_message);
        } else {
            invento_system_log($system_log_message);
        }
    } else {
        $id = 0;
    }
    return (isset($id)) ? $id : FALSE;
}

function my_track_login($table_name, $id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
    $ci = & get_instance();
    $data = modified_authorship($data);
    $session_data = get_active_session();
    $ci->db->where($id_field_override, $id);
    $id = $ci->db->update($table_name, $data);
    $system_log_message = $ci->db->last_query();
    //$public_log_message = $title . " " . $ci->config->item('login') . " @ " . inv_datetime_format_view($data['modified_date']);
    $public_log_message = public_log_generator($session_data['username'] . " (" . $session_data['name'] . ")", $ci->config->item('login'), "", $data['modified_date']);
    if ($insert_public_log) {
        invento_log($system_log_message, $public_log_message);
    } else {
        invento_system_log($system_log_message);
    }
    return (isset($id)) ? $id : FALSE;
}

function new_visit($ip) {
    $ci = & get_instance();
    $new_ip = $ip;

    $ci->db->from('visitas');
    $ci->db->where('ip_addr', $new_ip);
    $query = $this->db->get();
    $count = $query->num_rows();

    if ($count > 0) {
        $currentv = new DateTime('NOW');
        $currentv = $currentv->format('Y-m-d H:i:s'); // had to format this

        $q = $this->db->query("SELECT TIMESTAMPDIFF(HOUR, '$currentv', last_visit) as timediff FROM visitas WHERE ip_addr = '$new_ip'");

        $time_diff = $q->row()->timediff;
        // return $time_diff; <-- just for testing

        if ($time_diff > 10) {
            $ci->db->set('cant_visit', 'cant_visit+1', FALSE);
            $ci->db->set('last_visit', 'NOW()', FALSE);
            $ci->db->update('visitas');
        }
    } else {
        $data = array(
            'ip_addr' => $new_ip
        );
        $ci->db->set('cant_visit', 'cant_visit+1', FALSE);
        $ci->db->set('first_visit', 'NOW()', FALSE);
        $ci->db->insert('visitas', $data);
    }
}

function public_log_generator($user, $action, $title, $timestamp) {
    $ci = & get_instance();
    return $ci->config->item('user') . " '$user' $action $title @ $timestamp";
}

function invento_log($system_log_message, $public_log_message) {
    $ci = & get_instance();
    $next_system_logs_id = my_get_auto_increment_value("system_logs");
    if ($system_log_message != "") {
        invento_system_log($system_log_message, "system_logs");
    }
    if ($public_log_message != "") {
        invento_user_log($public_log_message, "logs", $next_system_logs_id);
    }
}

function invento_system_log($message, $table_name = "system_logs") {
    $ci = & get_instance();
    $session_data = get_active_session();
    if (isset($session_data['username'])) {
        $username = $session_data['username'];
    } else {
        $username = "system";
    }
    $logdata = array(
        'time' => inv_get_current_datetime_db(),
        'username' => $username,
        'activity' => $message
    );
    $ci->db->insert($table_name, $logdata);
}

function invento_user_log($message, $table_name, $next_system_logs_id) {
    $ci = & get_instance();
    $session_data = get_active_session();
    if (isset($session_data['username'])) {
        $username = $session_data['username'];
    } else {
        $username = "system";
    }
    $logdata = array(
        'time' => inv_get_current_datetime_db(),
        'username' => $username,
        'activity' => $message,
        'system_log_id' => $next_system_logs_id
    );
    $ci->db->insert($table_name, $logdata);
}
