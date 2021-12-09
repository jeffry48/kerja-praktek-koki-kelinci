<?php

/* --- PASSWORD MANAGEMENT --- */

function generate_password($string) {
    return md5($string);
}

/* --- PASSWORD MANAGEMENT --- */

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

/* --- PERMANENT --- */

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

function get_active_location() {
    $ci = & get_instance();
    $session_data = $ci->session->userdata($ci->config->item('session_location'));
    return $session_data['id'];
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

function restrict_page($page) {
    if (link_restriction($page)) {
        redirect('unauthorized', 'refresh');
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
