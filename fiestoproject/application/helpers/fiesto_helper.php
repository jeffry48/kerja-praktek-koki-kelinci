<?php

function generate_password($string) {
    return fiesto_pass_md5($string);
}

function fiesto_pass_md5($string) {
    return md5($string);
}

function fiesto_pass($string) {
    
}