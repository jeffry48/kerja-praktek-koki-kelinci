<?php

function parameter_manager($search_field, $parameter_count = 0) {
    $ci = & get_instance();
    $ci->data['advance_parameters'] = advance_parameter_manager($search_field, $parameter_count);
    $ci->data['search_parameters'] = search_parameter_manager($search_field, $parameter_count);
    $ci->data['offset_parameters'] = offset_parameter_manager($parameter_count);
    $ci->data['advance_parameter_buffer'] = inv_parameter_buffer($ci->data['advance_parameters']);
    $ci->data['search_parameter_buffer'] = inv_parameter_buffer($ci->data['search_parameters']);
    $ci->data['offset_parameter_buffer'] = inv_parameter_buffer($ci->data['offset_parameters']);
}

//function parameter_manager($search_field, $parameter_count = 0) {
//    $ci = & get_instance();
//    $ci->data['advance_parameters'] = advance_parameter_manager($search_field, $parameter_count);
//    $ci->data['search_parameters'] = search_parameter_manager($search_field, $parameter_count);
//    $ci->data['offset_parameters'] = offset_parameter_manager($parameter_count);
//    $ci->data['advance_parameter_buffer'] = inv_parameter_buffer($ci->data['advance_parameters']);
//    $ci->data['search_parameter_buffer'] = inv_parameter_buffer($ci->data['search_parameters']);
//    $ci->data['offset_parameter_buffer'] = inv_parameter_buffer($ci->data['offset_parameters']);
//}

function search_parameter_manager($search_field, $parameter_count = 0) {
    /* GET SEARCH PARAMETER ONLY */
    $ci = & get_instance();
    $default_value = $ci->config->item('default_value');
    $parameters = parameter_decoder(inv_url_reader($parameter_count));
    $searched_field = $search_field;
    $search_parameters = array();
    foreach ($parameters as $key => $parameter) {
        $index = array_search($key, $searched_field);
        if ($index > -1) {
            $search_parameters[$key] = urldecode($parameter);
            $ci->data[$key] = urldecode($parameter);
            unset($searched_field[$index]);
        }
    }
    foreach ($searched_field as $single) {
        $post = $ci->input->post($single);
        if (isset($post) && $post != "") {
            $search_parameters[$single] = $ci->input->post($single);
            $ci->data[$single] = $ci->input->post($single);
        } else if (isset($default_value[$single])) {
            $search_parameters[$single] = $default_value[$single];
            $ci->data[$single] = $default_value[$single];
        } else {
            $search_parameters[$single] = "~";
            $ci->data[$single] = "~";
        }
    }
    return $search_parameters;
}

function advance_parameter_manager($search_field, $parameter_count = 0) {
    /* GET PARAMETER BESIDE SEARCH FIELD AND OFFSET */
    $search_field[] = "offset";
    $ci = & get_instance();
    $parameters = parameter_decoder(inv_url_reader($parameter_count));
    $advance_parameters = array();
    foreach ($parameters as $key => $parameter) {
        if (!in_array($key, $search_field)) {
            $advance_parameters[$key] = urldecode($parameter);
            $ci->data[$key] = urldecode($parameter);
        }
    }
    return $advance_parameters;
}

function get_url_parameters($parameter_count = 0) {
    $search_field[] = "offset";
    $ci = & get_instance();
    $parameters = parameter_decoder(inv_url_reader($parameter_count));
    $advance_parameters = array();
    foreach ($parameters as $key => $parameter) {
        $ci->data[$key] = $parameter;
    }
}

function offset_parameter_manager($parameter_count = 0) {
    /* GET ONLY OFFSET PARAMETER */
    $ci = & get_instance();
    $default_value = $ci->config->item('default_value');
    $parameters = parameter_decoder(inv_url_reader($parameter_count));
    $offset_parameters = array();
    if (!isset($parameters['offset']) || $parameters['offset'] == "") {
        $offset_parameters['offset'] = $default_value['offset'];
        $ci->data['offset'] = $default_value['offset'];
    } else {
        $offset_parameters['offset'] = $parameters['offset'];
        $ci->data['offset'] = $parameters['offset'];
    }
    return $offset_parameters;
}

function parameter_decoder($parameters = array()) {
    $decoded_parameters = array();
    foreach ($parameters as $key => $parameter) {
        $decoded_parameters[$key] = urldecode($parameter);
    }
    return $decoded_parameters;
}

function parameter_management($name, $parameter_buffer = "", $search_params = array()) {
    $ci = & get_instance();
    $parameter = "";
    if (count($search_params) > 0 && isset($search_params[$name])) {
        $parameter = $search_params[$name];
    }
    if ($parameter != "") {
        $parameter_buffer = $parameter_buffer . "$name/$parameter/";
    }
    $ci->data[$name] = urldecode($parameter);
    return $parameter_buffer;
}

function search_text($data, $name, $parameter_buffer = "") {
    $ci = & get_instance();
    $post = "";
    if ($data != "") {
        $post = $data;
    }
    if ($post != "") {
        $parameter_buffer .= "$name/$post/";
    }
    $ci->data[$name] = urldecode($post);

    return $parameter_buffer;
}

function search_date_range($start_data, $start_date, $end_data, $end_date, $parameter_buffer = "") {
    $ci = & get_instance();
    $start_post = "";
    $end_post = "";
    if ($start_data != "") {
        $start_post = $start_data;
        if ($start_post == "") {
            if ($end_post != "") {
                $start_post = $end_post;
            } else {
                $start_post = "";
            }
        }
    }
    if ($end_data != "") {
        $end_post = $end_data;
        if ($end_post == "") {
            if ($start_post != "") {
                $end_post = $start_post;
            } else {
                $end_post = "";
            }
        }
    }
    if ($start_post != "") {
        $parameter_buffer .= "$start_date/$start_post/";
    }
    if ($end_post != "") {
        $parameter_buffer .= "$end_date/$end_post/";
    }
    $ci->data[$start_date] = $start_post;
    $ci->data[$end_date] = $end_post;

    return $parameter_buffer;
}

function parent_parameter_manager($offset_parameter_buffer, $search_parameter_buffer, $search_field, $parent_name = "parent") {
    $ci = & get_instance();
    $parent_offset_parameter_buffer = str_replace("offset", $parent_name . "_offset", $offset_parameter_buffer);
    $parent_search_parameter_buffer = $search_parameter_buffer;
    foreach ($search_field as $single_search_field) {
        $parent_search_parameter_buffer = str_replace($single_search_field, $parent_name . "_" . $single_search_field, $search_parameter_buffer);
    }
    $ci->data['parent_offset_parameter_buffer'] = $parent_offset_parameter_buffer;
    $ci->data['parent_search_parameter_buffer'] = $parent_search_parameter_buffer;
}

function parent_back_url($parent_name, $parameter_buffer) {
    $back_url = str_replace("$parent_name" . "_", "", $parameter_buffer);
    return $back_url;
}
