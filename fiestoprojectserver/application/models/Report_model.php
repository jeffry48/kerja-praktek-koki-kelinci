<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Report_model extends MY_Model {

    static $model_data = array(
        "table_name" => "",
        "order_by" => "",
        "search_field" => "",
        "single_search_field" => "",
        "search_parameter" => "",
        "query" => "",
    );
    
    function get_model_data() {
        return Report_model::$model_data;
    }

    function __construct() {
        parent::__construct();
    }

}
