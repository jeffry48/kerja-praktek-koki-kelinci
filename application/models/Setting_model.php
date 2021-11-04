<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Setting_model extends CI_model {

    static $basic_table_name = "s_settings";
    static $basic_query = "
        SELECT
            id, name, value
        FROM 
            s_settings
        ";
    static $basic_order_by = "";
    static $basic_search_by_field = "s_settings.name";
    static $basic_single_search_by_field = "s_settings.name";

    public function __construct() {
        parent::__construct();
    }

    public function get_maintenance_mode() {
        $search = "maintenance_mode";
        return $this->get_single_by_field($search);
    }

    public function get_single_by_field($search) {
        $advance_query = Setting_model::$basic_query;
        $where_query = "WHERE " . Setting_model::$basic_single_search_by_field . " = '$search'";
        $sql_query = "$advance_query $where_query";
        $query = $this->db->query($sql_query);
        return $query->row_array();
    }
    
    public function set_setting($name, $value) {
        $this->db->set("value", $value);
        $this->db->where("name =", $name);
        $this->db->update(Setting_model::$basic_table_name);
    }

}
