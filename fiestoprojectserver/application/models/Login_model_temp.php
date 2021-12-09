<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('MY_Model');
        $this->load->model('permission_model');
        $this->load->model('student_model');
        $this->load->model('club_model');
        $this->load->model('committee_model');
        $this->load->helper('fiesto_helper');
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

    function backend_validation($username, $password) {
        $sql_query = "
            SELECT id, username, role, location
            FROM s_users 
            WHERE username = BINARY '$username' 
                AND password = '" . generate_password($password) . "'
                AND role IN ('1', '2', '3')
            ";
        return $this->validate($sql_query);
    }

    function frontend_validation($username, $password) {
        $sql_query = "
            SELECT id, username, role, location
            FROM s_users 
            WHERE username = BINARY '$username' 
                AND password = '" . generate_password($password) . "' 
                AND role IN ('5')
            ";
        return $this->validate($sql_query);
    }

    function niku_validation($username, $password) {
        $sql_query = "
            SELECT id, username, role, location
            FROM s_users 
            WHERE username = BINARY '$username' 
                AND password = '" . generate_password($password) . "' 
                AND role IN ('6')
            ";
        return $this->validate($sql_query);
    }

    function committee_validation($username, $password) {
        $sql_query = "
            SELECT id, username, role, location
            FROM s_users 
            WHERE username = BINARY '$username' 
                AND password = '" . generate_password($password) . "' 
                AND role IN ('7')
            ";
        return $this->validate($sql_query);
    }

    function validate($sql_query) {
        $this->load->model('role_model');
        $this->load->model('location_model');
        $query = $this->db->query($sql_query);
        $result = $query->row_array();
        if (is_array($result) && count($result) > 0) {
            $row = $query->row();
            $role = $this->role_model->get_single_by_field($row->role);
            $data = array(
                'id' => $row->id,
                'username' => $row->username,
                'role' => $row->role,
                'role_name' => $role['name'],
                'role_identifier' => $role['identifier'],
                'location' => $row->location,
                'validated' => true
            );
            $this->session->set_userdata($this->config->item('session_name'), $data);

            $location = $this->location_model->get_single_by_field($row->location);
            $this->session->set_userdata($this->config->item('session_location'), $location);

            /* BANNED_PAGES: ROLES */
            $banned_pages_name = $this->permission_model->get_permissions_by_role($data['role_identifier']);
            $banned_pages = array();
            foreach ($banned_pages_name as $page) {
                $banned_pages[] = $page['banned_page_name'];
            }
            $this->session->set_userdata($this->config->item('session_banned_pages'), $banned_pages);

            return true;
        }
        return false;
    }

    public function track_login($id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
        $table_name = "s_users";
        $data = modified_authorship($data);
        $session_data = get_active_session();
        $this->db->where($id_field_override, $id);
        $id = $this->db->update($table_name, $data);
        $system_log_message = $this->db->last_query();
        //$public_log_message = $title . " " . $this->config->item('login') . " @ " . inv_datetime_format_view($data['modified_date']);
        $public_log_message = public_log_generator($session_data['username'] . " (" . $session_data['name'] . ")", $this->config->item('login'), "", $data['modified_date']);
        if ($insert_public_log) {
            invento_log($system_log_message, $public_log_message);
        } else {
            invento_system_log($system_log_message);
        }
        return (isset($id)) ? $id : FALSE;
    }

}
