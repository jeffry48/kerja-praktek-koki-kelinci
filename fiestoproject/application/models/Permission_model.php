<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Permission_model extends CI_Model {

    static $basic_table_name = "s_permissions";
    static $basic_table_field = "id, banned_page_name";
    static $basic_order_by_field = "banned_page_name";

    public function __construct() {
        parent::__construct();
    }

    public function get_auto_increment_value() {
        $query = $this->db->query("SHOW TABLE STATUS LIKE '" . Permission_model::$basic_table_name . "'");
        $results = $query->result_array();
        return $results[0]['Auto_increment'];
    }

    public function get_all() {
        $this->db->select(Permission_model::$basic_table_field);
        $this->db->from(Permission_model::$basic_table_name);
        $this->db->order_by(Permission_model::$basic_order_by_field, "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_permissions_by_role($role_identifier) {
        $sql_query = "
            SELECT 
                banned_page_name 
            FROM 
                s_permissions 
            WHERE 
                `$role_identifier` = 1";
        $query = $this->db->query($sql_query);
        return $query->result_array();
    }

    public function get_banned_page_names_by_role($role_identifier) {
        $query = $this->db->query("
            SELECT 
                banned_page_name 
            FROM 
                s_permissions 
            WHERE 
                $role_identifier = 1");
        $result = array();
        foreach ($query->result_array() as $row) {
            $result[] = $row['banned_page_name'];
        }
        return $result;
    }

    public function insert_permission($data, $session_data, $role) {
        $this->db->insert(Permission_model::$basic_table_name, $data);
        $id = $this->db->insert_id();
        $public_log_message = $this->config->item('user') . " " . $session_data['username'] . " " . $this->config->item('edit') . " " . $this->config->item('permission') . " of ". $role['name'] . " @ " . inv_datetime_format_view(inv_get_today_date_db());
        $this->log_model->invento_user_log($public_log_message);
        $system_log_message = $this->db->last_query();
        $this->log_model->invento_system_log($system_log_message);
        return (isset($id)) ? $id : FALSE;
    }

    public function delete_permission($role) {
        $this->db->where("role", $role);
        $id = $this->db->delete(Permission_model::$basic_table_name);
        return (isset($id)) ? $id : FALSE;
    }

}
