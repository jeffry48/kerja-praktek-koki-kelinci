<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_webmember_model extends MY_Model {
    var $role_id = 4;
    static $model_data = array(
        "table_name" => "s_users",
        "order_by" => "det.name ASC",
        "search_field" => "s_users.id",
        "single_search_field" => "s_users.id",
        "search_parameter" => "det.name",
        "query" => "
            SELECT 
                s_users.id, 
                s_users.location, 
                s_users.username, 
                s_users.password, 
                s_users.role, 
                s_users.status, 
                s_roles.name as 'role_name',
                s_locations.name as 'location_name',
                det.name,
                det.address,
                det.phone,
                det.email,
                det.birthdate,
                det.notes,
                det.photo
            FROM 
                s_users 
            LEFT JOIN 
                s_webmember_details det ON (det.user = s_users.id) 
            JOIN 
                s_roles ON (s_users.role = s_roles.id) 
            JOIN 
                s_locations ON (s_users.location = s_locations.id) 
            WHERE 
                s_users.deleted = 0 AND s_roles.deleted = 0 AND s_users.id != 0         
            ",
    );

    function get_webmembers($offset, $search = "", $status = "") {
        $status_query = "";
        if (!($status == "" || $status == "0" || $status == "~")) {
            $status_query = " AND s_users.status = '$status' ";
        }
        $role_query = " AND s_users.role = ".$this->role_id." ";
        $where_query = "AND s_users.id != '" . $this->config->item('user_default') . "' " . $role_query . $status_query . $this->module_search($search);
        $sql_query = User_webmember_model::$model_data['query'] . " $where_query " . $this->order_by();
        return my_get_all($sql_query, $offset);
    }

    function get_num_rows_webmembers($search = "", $status = "") {
        $status_query = "";
        if (!($status == "" || $status == "0" || $status == "~")) {
            $status_query = " AND s_users.status = '$status' ";
        }
        $role_query = " AND s_users.role = ".$this->role_id." ";
        $where_query = "AND s_users.id != '" . $this->config->item('user_default') . "' " . $role_query . $status_query . $this->module_search($search);
        return my_get_num_rows(get_my_num_rows(User_webmember_model::$model_data['table_name']) . $where_query);
    }

    function get_all_status() {
        return $this->config->item('available_users_status');
    }

    function get_all_status_with_labels() {
        $available_statuses = $this->get_all_status();
        $statuses = [];
        $i = 0;
        for ($i = 0; $i < sizeOf($available_statuses); $i++) {
            $statuses[$i] = array(
                        'id' => $available_statuses[$i],
                        'identifier' => $available_statuses[$i],
                        'name' => $this->lang->line($available_statuses[$i])
            );
        }
        return $statuses;
    }

    function get_model_data() {
        return User_webmember_model::$model_data;
    }

    function __construct() {
        parent::__construct();
    }

}
