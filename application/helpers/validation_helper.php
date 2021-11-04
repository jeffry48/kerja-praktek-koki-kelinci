<?php

/* ---- 
 * function validator($structure, $mode) {}
 * digunakan untuk membuat validasi dari codeigniter form_validation dan validasi javascript  
 * ---- */

function validator($structure, $mode) {
    $ci = & get_instance();

    $validations = form_validation_builder($structure);
    $form_images = array();
    $form_images_validation = array();
    foreach ($validations['validator'] as $key => $validator) {
        $validations_array = $validator['validation'];
        $validation_extension_array = $validator['validation_extension'];
        $set_validation = false; //use for image validation
        if ($validator['type'] == $ci->config->item('form_image')) {
            $is_image_required = false;
            foreach ($validations_array as $validation_single) {
                if ($validation_single == $ci->config->item('required')) {
                    $is_image_required = true;
                    break;
                }
            }
            $form_images[] = $key;
            if ($is_image_required && empty($_FILES[$key]['name'])) {
                $form_images_validation[] = $key;
                $ci->form_validation->set_rules("$key", $ci->lang->line("label_$key"), 'required');
            }
        } else {
            $set_validation = true;
        }
        if ($set_validation) {
            if (count($validation_extension_array) > 0) {
                if ($validation_extension_array['mode'] == $mode) {
                    foreach ($validation_extension_array['extension'] as $validation_rule => $validation_message) {
                        $validations_array[] = $validation_rule;
                        if (isset($validation_message) && $validation_message != "") {
                            if (strpos($validation_rule, "is_unique") !== false) {

                            } else if (strpos($validation_rule, "callback_") != false) {
                                $validation_rule = str_replace('callback_', '', $validation_rule);
                            }
                            $ci->form_validation->set_message("$validation_rule", $validation_message);
                        }
                    }
                }
            }
            $ci->form_validation->set_rules("$key", $ci->lang->line("label_$key"), $validations_array);
        }
    }
    $ci->data['requirements'] = $validations['requirements'];
    foreach ($validations['requirements'] as $key => $single) {
        $ci->data[$key] = $single;
    }
    $ci->data['form_images'] = $form_images;
    $ci->data['form_images_validation'] = $form_images_validation;
}

/* ---- 
 * function form_validation_builder($structure) {}
 * digunakan untuk melengkapi struktur form dengen default value 
 * ---- */

function form_validation_builder($structure) {
    $ci = & get_instance();
    $php_validator = array();
    $php_requirements = array();
    foreach ($structure as $single) {
        if (isset($single['required'])) {
            $is_required = $single['required'];
        } else {
            $is_required = 0;
        }
        $validation = array();
        $validation[] = $ci->config->item('validation_standard');
        if ($is_required == 1) {
            if ($single['type'] == $ci->config->item('form_textfield') ||
                    $single['type'] == $ci->config->item('form_textarea') ||
                    $single['type'] == $ci->config->item('form_image') ||
                    $single['type'] == $ci->config->item('form_radio') ||
                    $single['type'] == $ci->config->item('form_checkbox') ||
                    $single['type'] == $ci->config->item('form_datefield')) {
                $validator_required = $ci->config->item('required');
                $requirement_text = $ci->config->item('validation_required');
                $type = $single['type'];
                $validation[] = $validator_required;
            } else if ($single['type'] == $ci->config->item('form_combobox') ||
                    $single['type'] == $ci->config->item('form_combobox_multiple')) {
                $validator_required = "callback_combobox_required";
                $requirement_text = $ci->config->item('validation_required');
                $type = $ci->config->item('form_combobox');
                $validation[] = $validator_required;
            }
        } else {
            $validator_required = "";
            $requirement_text = "";
            $type = $single['type'];
        }

        if (isset($single['min_length'])) {
            $single_min_length = $single['min_length'];
        } else {
            $config_min_length = $ci->config->item('form_default_min_length');
            $single_min_length = $config_min_length[$single['type']];
        }
        if ($single_min_length > 0) {
            $validator_min_length = "min_length[" . $single_min_length . "]";
            $min_length = $single_min_length;
            $validation[] = $validator_min_length;
        } else {
            $validator_min_length = "";
            $min_length = "";
        }

        if (isset($single['max_length'])) {
            $single_max_length = $single['max_length'];
        } else {
            $config_max_length = $ci->config->item('form_default_max_length');
            $single_max_length = $config_max_length[$single['type']];
        }
        if ($single_max_length > 0) {
            $validator_max_length = "max_length[" . $single_max_length . "]";
            $max_length = $single_max_length;
            $validation[] = $validator_max_length;
        } else {
            $validator_max_length = "";
            $max_length = "";
        }

        if ($single['type'] == $ci->config->item('form_combobox_multiple')) {
            $name = $single['name'] . "[]";
        } else {
            $name = $single['name'];
        }
        if (isset($single['superedit'])) {
            $superedit = 1;
        } else {
            $superedit = 0;
        }
        if (isset($single['validation_extension'])) {
            $validation_extension = $single['validation_extension'];
        } else {
            $validation_extension = array();
        }
        $php_validator[$name] = array(
            'validation' => $validation,
            'type' => $type,
            'validation_extension' => $validation_extension
        );
        $php_requirements["requirement_" . $single['name']] = array(
            'name' => $name,
            'is_required' => $is_required,
            'requirement_text' => $requirement_text,
            'min_length' => $min_length,
            'max_length' => $max_length,
            'superedit' => $superedit,
            'type' => $single['type'],
        );
    }
    $data['validator'] = $php_validator;
    $data['requirements'] = $php_requirements;
    return $data;
}

function standard_validation($validation_name, $image_field_name, $validation_extension_array = null) {
    $ci = & get_instance();
    $ci->data['image_field_name'] = $image_field_name;
    $image_field_thumbnail_name = $image_field_name . "_thumbnail";

    $validations = validation_builder($validation_name);
    foreach ($validations['validator'] as $key => $validator) {
        $validations_array = $validator['validation'];
        $set_validation = false; //use for image validation
        if ($image_field_name != "") {
            if ($key == $image_field_name) {
                if (empty($_FILES[$image_field_name]['name'])) {
                    $ci->form_validation->set_rules("$key", $ci->lang->line("label_$image_field_name"), 'required');
                }
            } else {
                $set_validation = true;
            }
        } else {
            $set_validation = true;
        }
        if ($set_validation) {
            if (count($validation_extension_array) > 0) {

                /*
                 * STANDARD VALIDATION EXTENSION
                  $data = array(
                  'username' => 'call_back_username_check',
                  );
                  $data = array(
                  'username' => 'call_back_username_check|is_unique[s_users.username]',
                  );
                 */
                foreach ($validation_extension_array as $validation_extension) {
                    if ($key == $validation_extension['key_name']) {
                        $extensions = explode("|", $validation_extension['validation']);
                        foreach ($extensions as $extension) {
                            $validations[] = $extension;
                        }
                    }
                }

                /* CUSTOM VALIDATION EXTENSION
                  if ($key == "key_name") {
                  $validations[] = "callback_";
                  }
                  if ($key == "username") {
                  $validations_array[] = "callback_username_check";
                  $validations_array[] = "is_unique[s_users.username]";
                  }
                 */
            }
            $ci->form_validation->set_rules("$key", $ci->lang->line("label_$key"), $validations_array);
        }
    }
    $ci->data['requirements'] = $validations['requirements'];
    foreach ($validations['requirements'] as $key => $single) {
        $ci->data[$key] = $single;
    }
}

function validation_builder($module) {
    $ci = & get_instance();
    $requirements = $ci->requirement_model->get_all_by_field(-1, $module);
    $php_validator = array();
    $php_requirements = array();
    foreach ($requirements as $single) {
        $is_required = $single['required'];
        $validation = array();
        $validation[] = $ci->config->item('validation_standard');
        if ($single['required'] == 1) {
            if ($single['type'] == 1 ||
                    $single['type'] == 3 ||
                    $single['type'] == 4 ||
                    $single['type'] == 5 ||
                    $single['type'] == 6) {
                $validator_required = $ci->config->item('required');
                $requirement_text = $ci->config->item('validation_required');
                $type = $ci->config->item('form_field');
                $validation[] = $validator_required;
            } else if ($single['type'] == 2 || $single['type'] == 7) {
                $validator_required = "callback_combobox_required";
                $requirement_text = $ci->config->item('validation_required');
                $type = $ci->config->item('form_combobox');
                $validation[] = $validator_required;
            }
        } else {
            $validator_required = "";
            $requirement_text = "";
            $type = "";
        }
        if ($single['min_length'] > 0) {
            $validator_min_length = "min_length[" . $single['min_length'] . "]";
            $min_length = $single['min_length'];
            $validation[] = $validator_min_length;
        } else {
            $validator_min_length = "";
            $min_length = "";
        }
        if ($single['max_length'] > 0) {
            $validator_max_length = "max_length[" . $single['max_length'] . "]";
            $max_length = $single['max_length'];
            $validation[] = $validator_max_length;
        } else {
            $validator_max_length = "";
            $max_length = "";
        }
        if ($single['type'] == 7) {
            $name = $single['name'] . "[]";
        } else {
            $name = $single['name'];
        }
        $php_validator[$name] = array(
            'validation' => $validation,
            'type' => $type
        );
        $php_requirements["requirement_" . $single['name']] = array(
            'name' => $name,
            'is_required' => $is_required,
            'requirement_text' => $requirement_text,
            'min_length' => $min_length,
            'max_length' => $max_length,
            'superedit' => $single['superedit'],
            'type' => $single['type'],
        );
    }
    $data['validator'] = $php_validator;
    $data['requirements'] = $php_requirements;
    return $data;
}

function combobox_required_helper($value) {
    $ci = & get_instance();
    if ($value == "" || $value == 0) {
        $ci->form_validation->set_message('combobox_required', $ci->lang->line('notification_required_combobox'));
        return FALSE;
    } else {
        return TRUE;
    }
}

function username_check_helper($username) {
    $ci = & get_instance();
    foreach ($ci->config->item('forbidden_username') as $forbidden_username) {
        if ($username == $forbidden_username) {
            $ci->form_validation->set_message('username_check', $ci->lang->line('notification_user_default_insert_forbidden'));
            return FALSE;
        }
    }
    if (!valid_username($username)) {
        $ci->form_validation->set_message('username_check', $ci->lang->line('notification_user_default_characters_forbidden'));
        return FALSE;
    }
    return TRUE;
}

function check_if_username_exists($username) {
    $ci = & get_instance();
    $ci->load->model('user_model');
    if(!empty($ci->user_model->get_single_by_field($username, 'username'))) {
      $ci->form_validation->set_message('username_check', $ci->lang->line('notification_user_is_already_exist'));
      return TRUE;
    } else {
      return FALSE;
    }
}

function check_if_start_date_after_end_date($start_date, $end_date) {
    $ci = & get_instance();
    if ($start_date > $end_date) {
        $ci->form_validation->set_message('user_name', $ci->lang->line('notification_start_date_after_end_date'));
        return TRUE;
    }
    return FALSE;
}
