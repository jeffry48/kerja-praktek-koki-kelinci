<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class City_model extends MY_model {

    static $model_data = array(
        "table_name" => "m_areas",
        "order_by" => "name asc",
        "search_field" => "m_areas.id",
        "single_search_field" => "m_areas.id",
        "search_parameter" => "m_areas.name",
        "query" => "
            SELECT
                id, name
            FROM 
                m_areas
            WHERE
                deleted = 0 AND id != 0 
            ",
    );

    function get_all_city_indonesia() {
      $where_query = "AND id > 894" ;
      $sql_query = City_model::$model_data['query'] . " $where_query " . $this->order_by();
      return my_get_all($sql_query);
    }

    function get_model_data() {
        return City_model::$model_data;
    }

    function __construct() {
        parent::__construct();
    }

}
