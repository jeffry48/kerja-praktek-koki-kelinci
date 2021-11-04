<?php

function jwt_auth_header() {
    $authorization = "Authorization: " . get_active_token();
    $header = array('Content-Type: application/json', $authorization);
    return $header;
}

function standard_response($data) {
    $header = array('Content-Type: application/json', $data);
    return $header;
}

function parameterizeUrl($url, $arrayOfParams) {
    return $url . "?" . http_build_query($arrayOfParams);
}

function curl_request($method, $url, $header, $data = array()) {
    $curl = curl_init();
    switch ($method) {
        case "POST":
            $data = preg_replace('/\\\"/', "\"", $data);
            curl_setopt($curl, CURLOPT_POST, 1);
            if (!empty($data))
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if (!empty($data))
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}
