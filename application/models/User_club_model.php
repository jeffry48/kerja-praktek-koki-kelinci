<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_club_model extends MY_Model {

    static $model_data = array(
        "table_name" => "s_users",
        "order_by" => "s_users.id ASC",
        "search_field" => "s_users.id",
        "single_search_field" => "s_users.id",
        "search_parameter" => "s_users.username",
        "query" => "
            SELECT 
                s_users.id, 
                s_users.location, 
                s_users.username, 
                s_users.password, 
                s_users.role, 
                s_users.status, 
                m_clubs.id as 'user_detail_id', 
                m_clubs.name, 
                m_clubs.official_name, 
                m_clubs.city, 
                m_clubs.logo, 
                s_roles.name as 'role_name',
                s_locations.name as 'location_name'
            FROM 
                s_users 
            JOIN 
                m_clubs ON (m_clubs.user = s_users.id) 
            JOIN 
                s_roles ON (s_users.role = s_roles.id) 
            JOIN 
                s_locations ON (s_users.location = s_locations.id) 
            WHERE 
                s_users.deleted = 0 AND s_roles.deleted = 0 AND s_users.id != 0 
            ",
    );

    function get_all_no_superadmin($offset, $search = "", $role = "") {
        $role_query = "";
        if (!($role == "" || $role == "0" || $role == "~")) {
            $role_query = " AND s_users.role = $role ";
        }
        $where_query = "AND s_users.id != '" . $this->config->item('user_default') . "' " . $role_query . $this->module_search($search);
        $sql_query = User_club_model::$model_data['query'] . " $where_query " . $this->order_by();
        return my_get_all($sql_query, $offset);
    }

    function get_num_rows_no_superadmin($search = "", $role = "") {
        $role_query = "";
        if ($role != "") {
            $role_query = " AND s_users.role = $role ";
        }
        $where_query = "AND s_users.id != '" . $this->config->item('user_default') . "' " . $role_query . $this->module_search($search);
        return my_get_num_rows(get_my_num_rows(User_club_model::$model_data['table_name']) . $where_query);
    }

    function get_model_data() {
        return User_club_model::$model_data;
    }

    function __construct() {
        parent::__construct();
    }

}
