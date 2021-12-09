<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Unit_model extends MY_model {

    static $model_data = array(
        "table_name" => "m_units",
        "order_by" => "m_units.name ASC, m_units.metric ASC, m_units.conversion ASC",
        "search_field" => "m_units.id",
        "single_search_field" => "m_units.id",
        "search_parameter" => "m_units.name",
        "query" => "
            SELECT
                id, name, conversion, metric 
            FROM 
                m_units
            WHERE
                deleted = 0 AND id != 0 
            ",
    );

    function get_model_data() {
        return Unit_model::$model_data;
    }

    public function __construct() {
        parent::__construct();
    }

}