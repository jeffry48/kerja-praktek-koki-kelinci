<?php

function is_superadmin() {
    $ci = & get_instance();
    if (get_active_role() == $ci->config->item('role_superadmin')) {
        return true;
    } else {
        return false;
    }
}

function calculate_formula($data, $formula) {
    $result = 0;
    $formula_text = extract_text($formula);
    foreach ($formula_text as $single_formula_text) {
        $formula = str_replace('[' . $single_formula_text . ']', '$data["' . $single_formula_text . '"]', $formula);
    }
    eval('$result = ' . $formula . ';');
    return $result;
}

function formula_parser($string) {
    $string = str_replace("]", "", $string);
    $string = str_replace("[", "$", $string);
    $string = '$result = ' . $string . ';';
    return $string;
}

function extract_text($string) {
    $text_outside = array();
    $text_inside = array();
    $t = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == '[') {
            $text_outside[] = $t;
            $t = "";
            $t1 = "";
            $i++;
            while ($string[$i] != ']') {
                $t1 .= $string[$i];
                $i++;
            }
            $text_inside[] = $t1;
        } else {
            if ($string[$i] != ']')
                $t .= $string[$i];
            else {
                continue;
            }
        }
    }
    if ($t != "")
        $text_outside[] = $t;

    return $text_inside;
}

function quantity_updater($id, $database_model, $database_quantity, $post_quantity, $is_plus, $title = "") {
    /*
     * $is_plus = true >>> penjumlahan; 
     * $is_plus = false >>> pengurangan; 
     */
    if ($is_plus) {
        $new_quantity = $database_quantity + $post_quantity;
    } else {
        $new_quantity = $database_quantity - $post_quantity;
    }
    $data_product = array(
        'quantity' => $new_quantity,
    );
    if ($title == "") {
        $database_model->update($id, $data_product, "", false);
    } else {
        $database_model->update($id, $data_product, $title);
    }
}

function inv_generate_code($prefix) {
    //return $prefix . inv_get_current_datetime_stamp() . intval(rand(0, 9) . rand(0, 9) . rand(0, 9));
    return $prefix . inv_get_current_datetime_stamp() . intval(rand(0, 9));
}

function lang_code_generator($code, $counter) {
    return " [CODE " . $code . "-" . str_pad($counter, 3, "0", STR_PAD_LEFT) . "]";
}

function valid_username($str) {
    return !preg_match('/[^A-Za-z0-9._]/', $str);
}

function rmdir_recursive($directory) {
    foreach (scandir($directory) as $file) {
        if ('.' === $file || '..' === $file) {
            continue;
        }
        if (is_dir("$directory/$file")) {
            rmdir_recursive("$directory/$file");
        } else {
            unlink("$directory/$file");
        }
    }
    rmdir($directory);
}

function inv_array_to_params($array, $primary_param = "", $additional_param = "") {
    $param_buffer = $primary_param;
    foreach ($array as $single) {
        if ($param_buffer == "") {
            $param_buffer = $single;
        } else {
            $param_buffer = $param_buffer . "/" . $single;
        }
    }
    if ($additional_param != "") {
        if ($param_buffer == "") {
            $param_buffer = $additional_param;
        } else {
            $param_buffer = $param_buffer . "/" . $additional_param;
        }
    }
    return $param_buffer;
}

function inv_url_reader($segment = 0) {
    $ci = & get_instance();
    return $ci->uri->uri_to_assoc(3 + intval($segment));
}

function inv_parameter_buffer($parameters = array()) {
    $parameter_buffer = "";
    foreach ($parameters as $key => $parameter) {
        if ($parameter_buffer == "") {
            $parameter_buffer = "$key/$parameter";
        } else {
            $parameter_buffer = $parameter_buffer . "/$key/$parameter";
        }
    }
    return $parameter_buffer;
}

function inv_parameter_finder($parameters = array(), $parameter_finder = "", $parameter_set_value = "") {
    $found = false;
    foreach ($parameters as $key => $parameter) {
        if ($key == $parameter_finder) {
            $found = true;
        }
    }
    if ($found) {
        return $parameter;
    } else {
        return $parameter_set_value;
    }
}

function inv_parameter_setter($parameters, $parameter_name, $parameter_value) {
    if ($parameter_value == "") {
        $parameter_value = "~";
    }
    $parameters[$parameter_name] = $parameter_value;
    return $parameters;
}

function inv_empty($var) {
    if (is_array($var)) {
        if (empty($var)) {
            return true;
        } else {
            return false;
        }
    } else {
        if ($var == null || $var == "" || $var == 0) {
            return true;
        } else {
            return false;
        }
    }
}

function inv_set_default_empty($var) {
    if (is_array($var)) {
        if (empty($var)) {
            return array();
        } else {
            return $var;
        }
    } else {
        if ($var == null || $var == "") {
            return "";
        } else {
            return inv_sanitize($var);
        }
    }
}

function inv_sanitize($string) {
    return inv_rip_tags(stripslashes(trim(filter_var($string, FILTER_SANITIZE_STRING))));
}

function inv_in_array_multi($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_multi($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

function array_compare($first, $second) {
    sort($first);
    sort($second);
    if ($first == $second) {
        return true;
    } else {
        return false;
    }
}

function inv_rip_tags($string) {
    // ----- remove HTML TAGs -----
    $string = preg_replace('/<[^>]*>/', ' ', $string);
    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space
    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    return $string;
}

function inv_format_negative($number, $is_decimal = false) {
    if ($number < 0) {
        $number = str_replace("-", "", $number);
    }
    if ($is_decimal) {
        $number = inv_format_decimal($number);
    } else {
        $number = inv_format_number($number);
    }
    $negative_number = "($number)";
    return $negative_number;
}

function inv_format_number($number, $decimals = 0, $dec_point = ',', $thousands_sep = '.') {
    if ($number == null || $number == "") {
        $number = 0;
    }
    return number_format($number, $decimals, $dec_point, $thousands_sep);
}

function inv_format_decimal($number, $decimals = 2, $dec_point = ',', $thousands_sep = '.') {
    if ($number == null || $number == "") {
        $number = (float) 0;
    }
    return number_format($number, $decimals, $dec_point, $thousands_sep);
}

function inv_strip_thousand_separator($string, $thousand_separator = '.', $comma = ',') {
    if ($string == null || $string == "") {
        return 0;
    } else {
        return str_replace($comma, $thousand_separator, str_replace($thousand_separator, '', $string));
    }
}

function inv_is_number($number) {
    return (bool) preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $number);
}

function inv_create_code($prefix, $string, $pad_length = -1) {
    $ci = & get_instance();
    if ($pad_length == -1) {
        $pad_length = $ci->config->item('code_pad_length');
    }
    $length = $pad_length - strlen($prefix);
    return $prefix
            . str_pad($string, $length, $ci->config->item('code_pad_string'), STR_PAD_LEFT);
}

function inv_create_location_based_code($prefix, $string, $pad_length = -1) {
    $ci = & get_instance();
    if ($pad_length == -1) {
        $pad_length = $ci->config->item('code_pad_length') - 3;
    }
    $length = $pad_length - strlen($prefix);
    return $prefix
            . str_pad(get_active_location(), 2, $ci->config->item('code_pad_string'), STR_PAD_LEFT)
            . "L"
            . str_pad($string, $length, $ci->config->item('code_pad_string'), STR_PAD_LEFT);
}

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

function convert_array_into_select2_format($array) {
    $ci = & get_instance();
    $i = 1;
    $new_format = array();
    foreach ($array as $key => $value) {
        $new_format[$i] = array(
            'id' => $key,
            'name' => $ci->lang->line('label_' . $value)
        );
        $i++;
    }
    return $new_format;
}

function num_of_integer_separator($length) {
    //            1                        1 = 0
    //            12                       2 = 0
    //            123                      3 = 0
    //            1.234                    4 = 1
    //            12.345                   5 = 1
    //            123.456                  6 = 1
    //            1.234.567                7 = 2
    //            12.345.678               8 = 2
    //            123.456.789              9 = 2
    //            1.234.567.890           10 = 3
    //            12.345.678.901          11 = 3
    //            123.456.789.012         12 = 3
    //            1.234.567.890.123       13 = 4
    //            12.345.678.901.234      14 = 4
    //            123.456.789.012.345     15 = 4
    //            1.234.567.890.123.456   16 = 5
    //            12.345.678.901.234.567  17 = 5
    //            123.456.789.012.345.678 18 = 5
    return floor(($length - 1) / 3);
}
