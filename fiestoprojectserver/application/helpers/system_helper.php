<?php

function global_form_validator($structure) {
    $ci = & get_instance();

    $validations = form_validation_builder($structure, $model);
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