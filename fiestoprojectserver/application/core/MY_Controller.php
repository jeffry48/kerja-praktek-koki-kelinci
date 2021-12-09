<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    static $module = "controller";
    static $default_model = "";

    function __construct() {
        parent::__construct();
        $this->load->helper('api');
        /* No Cache Options */
        //$this->browsercache->cacheFor(0); //Cache a page for 0 minutes
        //$this->browsercache->dontCache(); //Prevent a page from being cached
        /* No Cache Options */

        /* Verify api status */

        if (!api_check_authentification()) {
            $this->session->set_flashdata('notification', $this->config->item('error'));
            $this->session->set_flashdata('message', $this->lang->line('notification_unauthorized_api_access'));
            api_response(api_generate_result());
            die();
        }

        /* Verify api status */
    }

    public function get_list_data() {
        return MY_Controller::$default_model->get_all();
    }

    public function get_single_data() {
        api_response(MY_Controller::$default_model->get_single_by_field($this->input->post('id')));
    }

    public function get_single_data_array() {
        return MY_Controller::$default_model->get_single_by_field($this->input->post('id'));
    }

    public function get_list_data_json() {
        api_response($this->get_list_data());
    }

    public function get_single_data_json() {
        api_response($this->get_single_data());
    }

    public function get_title_identifier($form_name, $data) {
        $value = $this->lang->line('label_identifier');
        if ($form_name == "add_data" || $form_name == "edit_data" || $form_name == "delete_data") {
            $value = $data['name'];
        }
        return $this->lang->line('label_' . MY_Controller::$module) . " '$value'";
    }

    public function ci_form_validator($form_name) {
        if ($form_name == "add_data" || $form_name == "edit_data") {
            $validation_rules = array();
            foreach ($this->get_structure(true) as $single_structure) {
                $rules = "trim";
                if (isset($single_structure['required']) && $single_structure['required']) {
                    $rules .= "|required";
                }
                if (isset($single_structure['min_length']) && $single_structure['min_length'] != "") {
                    $rules .= "|min_length[" . $single_structure['min_length'] . "]";
                } else {
                    $rules .= "|min_length[1]";
                }
                $rules .= "|max_length[" . MY_Controller::$default_model->get_column_max_length($single_structure['name']) . "]";
                $validation_rules[] = array(
                    'field' => $single_structure['name'],
                    'label' => $this->lang->line('label_' . $single_structure['name']),
                    'rules' => $rules,
                );
            }
            $this->form_validation->set_rules($validation_rules);
        }
        if ($this->form_validation->run() == true) {
            return true;
        } else {
            return false;
        }
    }

    public function generate_data() {
        $data = array();
        foreach ($this->get_structure(true) as $single_structure) {
            $post_value = $this->input->post($single_structure['name']);
            if ($single_structure['type'] == $this->config->item('form_numberfield')) {
                $post_value = inv_strip_thousand_separator($post_value);
            } else if ($single_structure['type'] == $this->config->item('form_datefield')) {
                $post_value = inv_date_format_view($post_value);
            }
            $data[$single_structure['name']] = $post_value;
        }
        return $data;
    }

    public function add_data() {
        if ($this->ci_form_validator("add_data")) {
            $data = $this->generate_data();
            $title = $this->get_title_identifier("add_data", $data);
            MY_Controller::$default_model->insert($data, $title);
            $this->session->set_flashdata('notification', $this->config->item('success'));
            $this->session->set_flashdata('message', $title . $this->lang->line('notification_success_add'));
        } else {
            $this->session->set_flashdata('notification', $this->config->item('error'));
            $this->session->set_flashdata('message', $this->lang->line('notification_recheck_data'));
        }
        api_response(api_generate_result());
    }

    public function edit_data() {
        if ($this->ci_form_validator("edit_data")) {
            $single_data = $this->get_single_data_array();
            if (empty($single_data)) {
                $this->session->set_flashdata('notification', $this->config->item('error'));
                $this->session->set_flashdata('message', $this->lang->line('notification_no_' . MY_Controller::$module . '_found'));
            } else {
                $data = $this->generate_data();
                $title = $this->get_title_identifier("edit_data", $data);
                MY_Controller::$default_model->update($this->input->post('id'), $data, $title);

                $this->session->set_flashdata('notification', $this->config->item('success'));
                $this->session->set_flashdata('message', $title . $this->lang->line('notification_success_update'));
            }
        } else {
            $this->session->set_flashdata('notification', $this->config->item('error'));
            $this->session->set_flashdata('message', $this->lang->line('notification_recheck_data'));
        }
        api_response(api_generate_result());
    }

    public function delete_data() {
        $single_data = $this->get_single_data_array();
        if (empty($single_data)) {
            $this->session->set_flashdata('notification', $this->config->item('error'));
            $this->session->set_flashdata('message', $this->lang->line('notification_no_' . MY_Controller::$module . '_found'));
        } else {
            $title = $this->get_title_identifier("delete_data", $single_data);
            MY_Controller::$default_model->delete($this->input->post('id'), array(), $title);

            $this->session->set_flashdata('notification', $this->config->item('success'));
            $this->session->set_flashdata('message', $title . $this->lang->line('notification_success_delete'));
        }
        api_response(api_generate_result());
    }

}
