<?php

function api_response($data) {
    print_r(json_encode($data));
}

function api_generate_result() {
    $ci = & get_instance();
    return array(
        'notification' => $ci->session->flashdata('notification'),
        'message' => validation_errors() ? validation_errors() : $ci->session->flashdata('message'),
    );
}

function api_json_decode() {
    return json_decode(file_get_contents('php://input'));
}

function api_get_username() {
    $ci = & get_instance();
    return $ci->input->post('auth_username');
}

function api_get_password() {
    $ci = & get_instance();
    return $ci->input->post('auth_password');
}

function api_get_token() {
    $ci = & get_instance();
    return $ci->input->post('auth_token');
}

function api_get_location() {
    $ci = & get_instance();
    return $ci->input->post('auth_location');
}

function api_get_authorization() {
    $ci = & get_instance();
    $headers = $ci->input->request_headers();
    if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
      $decodedToken = AUTHORIZATION::validateToken($headers['Authorization']);
    }
    $data = array(
        'username' => $decodedToken->username,
        'password' => $decodedToken->password,
        'location' => api_get_location(),
    );
    if (check_required($data['location'])) {
        if (check_username_password($data['username'], $data['password'])) {
            return $data;
        }
    }
    return array();
}

function api_check_authentification(){
    $ci = & get_instance();
    $headers = $ci->input->request_headers();
    if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
        $decodedToken = AUTHORIZATION::validateToken($headers['Authorization']);
        if ($decodedToken != false) {
            return true;
        }
    }
    return false;
}

function check_username_password($username, $password) {
    $ci = & get_instance();
    $ci->load->model('login_model');

    $validation = $ci->login_model->login_validation($username, generate_password($password));
    return $validation;
}

function check_required($data) {
    if (!($data == null || $data == 'undefined' || $data == "")) {
        return true;
    } else {
        return false;
    }
}