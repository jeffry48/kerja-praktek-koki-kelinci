<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Department_model extends MY_model {

    static $model_data = array(
        "table_name" => "m_departments",
        "order_by" => "m_departments.name ASC",
        "search_field" => "m_departments.id",
        "single_search_field" => "m_departments.id",
        "search_parameter" => "m_departments.name",
        "query" => "
            SELECT
                id, name 
            FROM 
                m_departments
            WHERE
                deleted = 0 AND id != 0 
            ",
    );

    function get_model_data() {
        return Department_model::$model_data;
    }

    public function __construct() {
        parent::__construct();
    }

}