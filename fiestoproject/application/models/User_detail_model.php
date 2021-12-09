<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class User_detail_model extends MY_Model {

  static $model_data = array(
    "table_name" => "s_user_details",
    "order_by" => "",
    "search_field" => "s_user_details.user",
    "single_search_field" => "s_user_details.user",
    "search_parameter" => "s_user_details.name",
    "query" => "
            SELECT 
                s_user_details.id, 
                s_user_details.name, 
                s_user_details.address, 
                s_user_details.phone, 
                s_user_details.email, 
                s_user_details.notes, 
                s_user_details.birthdate, 
                s_user_details.photo 
            FROM 
                s_user_details 
            WHERE 
                s_user_details.deleted = 0 AND s_user_details.id != 0 
            ",
  );

  function get_model_data() {
    return User_detail_model::$model_data;
  }

  function __construct() {
    parent::__construct();
  }

}
