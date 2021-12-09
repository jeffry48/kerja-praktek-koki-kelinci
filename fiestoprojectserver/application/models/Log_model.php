<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Log_model extends MY_model {

    static $model_data = array(
        "table_name" => "logs",
        "order_by" => "logs.time DESC",
        "search_field" => "logs.username",
        "single_search_field" => "logs.username",
        "search_parameter" => "logs.username",
        "query" => "
            SELECT 
                id, time, activity, username
            FROM 
                logs 
            WHERE 
                time <> ''
            ",
    );

    function get_model_data() {
        return Location_model::$model_data;
    }

    public function __construct() {
        parent::__construct();
    }

}
