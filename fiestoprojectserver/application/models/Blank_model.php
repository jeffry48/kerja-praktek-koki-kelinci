<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Blank_model extends MY_Model {

    static $model_data = array(
        "table_name" => "m_blanks",
        "order_by" => "m_blanks.name",
        "search_field" => "m_blanks.id",
        "single_search_field" => "m_blanks.id",
        "search_parameter" => "m_blanks.name",
        "query" => "
            SELECT
                id, name 
            FROM 
                m_blanks
            WHERE
                deleted = 0 AND id != 0 
            ",
    );

    public function module_search($search = "") {
        
    }

    function get_model_data() {
        return Blank_model::$model_data;
    }

    function __construct() {
        parent::__construct();
    }

}
