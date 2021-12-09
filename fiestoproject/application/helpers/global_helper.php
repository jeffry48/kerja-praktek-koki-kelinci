<?php

/* --- 
 * inv_generate_code($prefix) {} 
 * this function generate code for database master code 
 * --- */

function build_url($basic_url, $parameters = array(), $data = array()) {
    $ci = & get_instance();
    $url = base_url() . $basic_url . "/" . $ci->data['offset_parameter_buffer'];
    foreach ($parameters as $single) {
        $url .= "/" . $single . "/";
        if (count($data) > 0 && isset($data[$single]) && $data[$single] != "") {
            $url .= $data[$single];
        } else {
            $url .= $ci->data[$single];
        }
    }
    return $url;
}

function inv_generate_code($prefix) {
    return $prefix . inv_get_current_datetime_stamp_no_miliseconds() . intval(rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));
}

function lang_code_generator($code, $counter) {
    return " [CODE " . $code . "-" . str_pad($counter, 3, "0", STR_PAD_LEFT) . "]";
}

function valid_username($str) {
    return !preg_match('/[^A-Za-z0-9._]/', $str);
}

function get_session($session_name) {
    $ci = & get_instance();
    return $ci->session->userdata($session_name);
}

function set_session($session_name, $session_data) {
    $ci = & get_instance();
    $ci->session->set_userdata($session_name, $session_data);
}

function get_active_role() {
    $ci = & get_instance();
    $session_data = get_session($ci->config->item('session_name'));
    return $session_data['role'];
}

function get_active_session() {
    $ci = & get_instance();
    return get_session($ci->config->item('session_name'));
}

function get_active_token() {
    $ci = & get_instance();
    return get_session($ci->config->item('session_name'))['token'];
}

function get_active_location() {
    $ci = & get_instance();
    return get_session($ci->config->item('session_name'))['location'];
}

function get_location_data() {
    $ci = & get_instance();
    $session_data = $ci->session->userdata($ci->config->item('session_location'));
    return $session_data;
}

function is_headquarter() {
    $location = get_active_location();
    if ($location == 0) {
        return true;
    } else {
        return false;
    }
}

function link_restriction($page) {
    $ci = & get_instance();
    if (@in_array($page, $ci->session->userdata($ci->config->item('session_banned_pages')))) {
        return true;
    } else {
        return false;
    }
}

function get_current_url() {
    if ($_SERVER['SERVER_NAME'] == "localhost") {
        if (isset($_SERVER['REDIRECT_QUERY_STRING'])) {
            return $_SERVER['REDIRECT_QUERY_STRING'];
        } else {
            return $_SERVER['REQUEST_URI'];
        }
    } else {
        if (isset($_SERVER['SCRIPT_URL'])) {
            return $_SERVER['SCRIPT_URL'];
        } else {
            return $_SERVER['REQUEST_URI'];
        }
    }
}

function created_authorship($data) {
    $today = inv_get_current_datetime_db();
    $session_data = get_active_session();
    if (isset($session_data['username'])) {
        $data['created_by'] = $session_data['username'];
    } else {
        $data['created_by'] = "system";
    }
    $data['created_date'] = $today;
    return $data;
}

function modified_authorship($data) {
    $today = inv_get_current_datetime_db();
    $session_data = get_active_session();
    if (isset($session_data['username'])) {
        $data['modified_by'] = $session_data['username'];
    } else {
        $data['modified_by'] = "system";
    }
    $data['modified_date'] = $today;
    return $data;
}

function deleted_authorship($data) {
    $today = inv_get_current_datetime_db();
    $session_data = get_active_session();
    $data['deleted'] = 1;
    $data['deleted_by'] = $session_data['username'];
    $data['deleted_date'] = $today;
    return $data;
}

function get_maintenance_setting() {
    $ci = & get_instance();
    $maintenance_mode = $ci->setting_model->get_maintenance_mode();
    return $maintenance_mode['value'];
}

function is_maintenance_mode() {
    if (get_maintenance_setting() == 1) {
        redirect('/maintenance');
    }
}

function is_maintenance_over() {
    if (get_maintenance_setting() == 0) {
        redirect(base_url());
    }
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

function generate_pdf($content = '', $filename, $title = '', $header = '', $footer = '', $page_size = 'A4', $orientation = 'P') {
    $ci = & get_instance();
    $ci->load->library('pdf');
    // create new PDF document
    $pdf = $ci->pdf->load();
    $pdf->SetCreator($ci->lang->line('application_title'));
    $pdf->SetAuthor($ci->lang->line('application_title'));
    $pdf->SetTitle($title);
    $pdf->SetSubject($ci->lang->line('application_title'));
    $pdf->SetKeywords($ci->lang->line('application_title'));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(0, 5, 0);

    // $fonts = array('Campton-Bold.ttf', 'Campton-Regular.ttf');
    // foreach ($fonts as $font) {
    //     $fontname = TCPDF_FONTS::addTTFfont(realpath("./application/third_party/") . 'tcpdf_min/fonts/' . $font, 'TrueTypeUnicode', '', 32);
    //     $pdf->SetFont($fontname, '', 10);
    // }
    // $pdf->SetHeaderData('',0,$header,'',array(0,0,0),array(255,255,255));
    // $pdf->SetFooterData(array(0,0,0),array(0,0,0));
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, "3");

    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set font
    // $fonts = array('Cuprum-Regular.ttf', 'Cuprum-Bold.ttf');
    // $fonts = array('Raleway-Bold.ttf', 'Raleway-ExtraBold.ttf', 
    // 'Raleway-ExtraLight.ttf', 'Raleway-Heavy.ttf', 'Raleway-Medium.ttf',
    // 'Raleway-Regular.ttf', 'Raleway-SemiBold.ttf', 'Raleway-Thin.ttf');
    // define invoice style
    //Add Page(s)
    if (is_array($content)) {
        foreach ($content as $halaman) {
            $pdf->AddPage($orientation, $page_size);
            $pdf->writeHTML($halaman, true, false, true, false, '');
        }
    } else {
        $pdf->AddPage($orientation, $page_size);
        $pdf->writeHTML($content, true, false, true, false, '');
    }

    //Close and output PDF document
    $pdf->Output($filename, 'I');
}

function sendmail($receiver, $subject, $content, $attachments = array(), $cc = array(), $bcc = array()) {
    $ci = & get_instance();
    $ci->load->library('email');
    $ci->load->config('email');

    $config = Array(
        'protocol' => $ci->config->item('smtpprotocol'),
        'smtp_host' => $ci->config->item('smtphost'),
        'smtp_port' => $ci->config->item('smtpport'),
        'smtp_user' => $ci->config->item('smtpuser'),
        'smtp_pass' => $ci->config->item('smtppass'),
        'mailtype' => $ci->config->item('smtpmailtype'),
        'charset' => $ci->config->item('smtpcharset')
    );

    $ci->email->set_newline("\r\n");
    $ci->email->from($ci->lang->line('email_sender'), $ci->lang->line('email_web_site_name'));
    $ci->email->to($receiver);
    $ci->email->cc($cc);
    $ci->email->cc($bcc);
    $ci->email->subject($subject);
    $ci->email->message($content);
    if (!empty($attachments)) {
        foreach ($attachments as $attachment) {
            $ci->email->attach($attachment);
        }
    }

    $result = $ci->email->send();
    if (false) {
        show_error($ci->email->print_debugger());
    }

    if ($result == 1) {
        $ci->session->set_flashdata('status_message', $ci->lang->line('notification_send_email_success'));
        $ci->session->set_flashdata('status_type', $ci->config->item('success'));
    } else {
        $ci->session->set_flashdata('status_message', $ci->lang->line('notification_send_email_failed'));
        $ci->session->set_flashdata('status_type', $ci->config->item('error'));
    }
    return $result;
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
