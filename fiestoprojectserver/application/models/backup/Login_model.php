<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('MY_Model');
        $this->load->model('permission_model');
    }

    function get_usernames($username) {
        $sql_query = "SELECT id FROM s_users WHERE username = '$username'";
        $query = $this->db->query($sql_query);
        $result = $query->row_array();
        if (is_array($result) && count($result) > 0) {
            return true;
        }
        return false;
    }

    function get_credentials_by_username($username) {
        $sql_query = "SELECT id, location, username, role, status FROM s_users WHERE username = '$username'";
        $query = $this->db->query($sql_query);
        $result = $query->row_array();
        if (is_array($result) && count($result) > 0) {
            return $result;
        }
        return 0;
    }

    function login_validation($username, $password) {
        $sql_query = "
            SELECT
                id, username, role, location, password
            FROM 
                s_users 
            WHERE 
                username = BINARY '$username'
            ";
        $query = $this->db->query($sql_query);
        $result = $query->row_array();
        if (is_array($result) && count($result) > 0) {
            if ($password == $result['password']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function track_login($id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
        $table_name = "s_users";
        $data = modified_authorship($data);
        $session_data = get_active_session();
        $this->db->where($id_field_override, $id);
        $id = $this->db->update($table_name, $data);
        $system_log_message = $this->db->last_query();
        $public_log_message = public_log_generator($session_data['username'], $this->config->item('login'), "", $data['modified_date']);
        if ($insert_public_log) {
            invento_log($system_log_message, $public_log_message);
        } else {
            invento_system_log($system_log_message);
        }
        return (isset($id)) ? $id : FALSE;
    }

}
