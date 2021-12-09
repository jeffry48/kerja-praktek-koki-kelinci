<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Webmember_detail_model extends MY_Model {

    static $model_data = array(
        "table_name" => "s_webmember_details",
        "order_by" => "",
        "search_field" => "s_webmember_details.id",
        "single_search_field" => "s_webmember_details.id",
        "search_parameter" => "s_webmember_details.name",
        "query" => "
            SELECT 
                s_webmember_detail_details.name, 
                s_webmember_detail_details.address, 
                s_webmember_detail_details.phone, 
                s_webmember_detail_details.email, 
                s_webmember_detail_details.notes, 
                s_webmember_detail_details.birthdate, 
                s_webmember_detail_details.photo 
            FROM 
                s_webmember_details 
            WHERE 
                s_webmember_details.deleted = 0 AND s_webmember_details.id != 0 
            ",
    );

    function get_model_data() {
        return Webmember_detail_model::$model_data;
    }

    function __construct() {
        parent::__construct();
    }

}
