<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Model extends CI_Model {

    static $model_data = array(
        "table_name" => "",
        "order_by" => "",
        "search_field" => "",
        "single_search_field" => "",
        "search_parameter" => "",
        "query" => "",
        "get_num_rows_query" => "",
    );

    function __construct() {
        parent::__construct();
    }

    function get_model_data() {
        
    }

    function get_all_by_field($offset, $field_value, $field = "", $search = "") {
        $model_data = $this->get_model_data();
        if ($field == "") {
            $field = $model_data['search_field'];
        }
        $where_query = "AND $field = '$field_value' " . $this->module_search($search);
        $sql_query = $model_data['query'] . " $where_query " . $this->order_by();
        return my_get_all($sql_query, $offset);
    }

    function get_num_rows_by_field($field_value, $field = "", $search = "") {
        $model_data = $this->get_model_data();
        if ($field == "") {
            $field = $model_data['search_field'];
        }
        $where_query = "AND $field = '$field_value' " . $this->module_search($search);
        $sql_query = $model_data['query'] . " $where_query " . $this->order_by();
        return my_get_num_rows($sql_query);
    }

    function get_all($offset_value = -1, $search = "") {
        $model_data = $this->get_model_data();
        return my_get_all($model_data['query'] . " " . $this->module_search($search) . " " . $this->order_by(), $offset_value);
    }

    function get_single_by_field($field_value, $field = "") {
        $model_data = $this->get_model_data();
        if ($field == "") {
            $field = $model_data['single_search_field'];
        }
        return my_get_single_by_field($model_data['query'], $field_value, $field);
    }

    function get_all_result($sql_query) {
        return my_get_all_result($sql_query);
    }

    function get_row_result($sql_query) {
        return my_get_row_result($sql_query);
    }

    function get_num_rows($search = "") {
        $model_data = $this->get_model_data();
        if (isset($model_data['get_num_rows_query']) && $model_data['get_num_rows_query'] != "") {
            $get_num_rows_query = $model_data['get_num_rows_query'];
        } else {
            $get_num_rows_query = get_my_num_rows($model_data['table_name']);
        }
        return my_get_num_rows($get_num_rows_query . $this->module_search($search));
//        return my_get_num_rows($model_data['query'] . " " . $this->module_search($search));
    }

    function get_auto_increment_value() {
        $model_data = $this->get_model_data();
        return my_get_auto_increment_value($model_data['table_name']);
    }

    function insert($data, $title, $insert_public_log = true) {
        $model_data = $this->get_model_data();
        return my_insert($model_data['table_name'], $data, $title, $insert_public_log);
    }

    function update($id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
        $model_data = $this->get_model_data();
        return my_update($model_data['table_name'], $id, $data, $title, $insert_public_log, $id_field_override);
    }

    function delete($id, $data, $title, $insert_public_log = true, $id_field_override = "id") {
        $model_data = $this->get_model_data();
        return my_delete($model_data['table_name'], $id, $data, $title, $insert_public_log, $id_field_override);
    }

    function module_search($search = "") {
        $model_data = $this->get_model_data();
        $location = get_active_location();
        $module_search = " AND " . $model_data['table_name'] . ".location = '$location'";
        if ($search != "") {
            $module_search .= " AND (" . $model_data['search_parameter'] . " LIKE '%$search%')";
        }
        return $module_search;
    }

    function order_by() {
        $model_data = $this->get_model_data();
        if ($model_data['order_by'] == "") {
            return "";
        } else {
            return "ORDER BY " . $model_data['order_by'];
        }
    }

}
