<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Role_model extends MY_model {

    static $model_data = array(
        "table_name" => "s_roles",
        "order_by" => "",
        "search_field" => "s_roles.id",
        "single_search_field" => "s_roles.id",
        "search_parameter" => "s_roles.name",
        "query" => "
            SELECT
                id, name, identifier  
            FROM 
                s_roles
            WHERE
                deleted = 0 
            ",
    );

    public function module_search($search = "") {}
    
    function get_model_data() {
        return Role_model::$model_data;
    }

    public function __construct() {
        parent::__construct();
    }

}
