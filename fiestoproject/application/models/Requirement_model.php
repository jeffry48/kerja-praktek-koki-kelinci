<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Requirement_model extends MY_model {

    static $model_data = array(
        "table_name" => "s_field_requirements",
        "order_by" => "",
        "search_field" => "s_field_requirements.module",
        "single_search_field" => "s_field_requirements.module",
        "search_parameter" => "s_users.module",
        "query" => "
            SELECT
                id, name, module, required, min_length, max_length, superedit, type 
            FROM 
                s_field_requirements
            WHERE
                deleted = 0
            ",
    );

    function get_model_data() {
        return Requirement_model::$model_data;
    }

    public function __construct() {
        parent::__construct();
    }

}
