<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Location_model extends MY_Model {

    static $model_data = array(
        "table_name" => "s_locations",
        "order_by" => "",
        "search_field" => "s_locations.id",
        "single_search_field" => "s_locations.id",
        "search_parameter" => "s_locations.name",
        "query" => "
            SELECT
                id, code, name, address, phone, location_group
            FROM 
                s_locations
            WHERE
                deleted = 0
            ",
    );
    

    public function get_all_not_in($dataset) {
        $field = Location_model::$model_data['search_field'];
        if ($dataset == "") {
            $where_query = "AND $field NOT IN ('')";
        } else {
            $where_query = "AND $field NOT IN ($dataset)";
        }
        $sql_query = Location_model::$model_data['query'] . " $where_query " . $this->order_by();
        return parent::my_get_all($sql_query, -1);
    }
    
    function get_model_data() {
        return Location_model::$model_data;
    }
    
    public function __construct() {
        parent::__construct();
    }

}
