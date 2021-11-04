<?php

class MY_Controller extends CI_Controller {

    static $module = "";
    static $identifier = ""; /* database field that identify this module */
    static $folder = ""; /* backend/ or frontend/ */
    static $use_image = ""; /* blank if this module use no photo */
    static $use_custom_js_module = ""; /* blank if this module use no photo */
    static $use_custom_sort = ""; /* blank if this module use no photo */
    static $use_custom_filter = ""; /* blank if this module use no photo */
    static $navigation_parent = ""; /* for breadcrumbs and navigation */
    static $search_field = array();
    static $base_model = "";
    static $use_api = false;
    static $session_name = "";
    static $session_details = "";
    static $session_payments = "";
    static $session_fields = array();
    static $session_detail_fields = array();
    static $session_db_fields = array();
    static $default_id = "id";

    function __construct() {
        parent::__construct();
        $this->load->model('requirement_model');
        $active_session = get_active_session();
        if (!$active_session) {
            redirect(base_url() . 'kelola', 'refresh');
        } else {
            $this->data['maintenance_setting'] = get_maintenance_setting();
            $this->data['session_data'] = $active_session;
        }
    }

    function combobox_required($value) {
        combobox_required_helper($value);
    }

    function inv_authorization($page) {
        if (link_restriction($page . "_" . MY_Controller::$module)) {
            redirect('unauthorized', 'refresh');
        }
    }

    function inv_module_restriction($actions, $restriction = 'forbidden') {
        foreach ($actions as $action) {
            if (link_restriction($action . "_" . MY_Controller::$module)) {
                $this->data[$restriction . "_" . $action] = true;
            } else {
                $this->data[$restriction . "_" . $action] = false;
            }
        }
    }

    function flash_management($result, $empty = false) {
        if ($empty) {
            $this->session->set_flashdata('message', $this->lang->line('notification_no_' . MY_Controller::$module . '_found'));
            $this->session->set_flashdata('notification', $this->config->item('error'));
        } else {
            $this->session->set_flashdata('message', $result['message']);
            $this->session->set_flashdata('notification', $result['notification']);
        }
    }

    function get_standard_redirect_url() {
        return MY_Controller::$module . "/management/" . $this->data['offset_parameter_buffer'] . "/" . $this->data['search_parameter_buffer'];
    }

    function get_custom_redirect_url($function_name) {
        return MY_Controller::$module . "/" . $function_name . "/" . $this->data['offset_parameter_buffer'] . "/" . $this->data['advance_parameter_buffer'] . "/" . $this->data['search_parameter_buffer'];
    }

    function strip_search_parameters() {
        foreach (MY_Controller::$search_field as $search_field) {
            if (isset($this->data[$search_field]) && $this->data[$search_field] == "~") {
                $this->data[$search_field] = "";
            }
        }
    }

    function lang_loader($expectedLanguage = "global", $expectedFile = "") {
        if ($expectedFile == "") {
            $expectedFile = MY_Controller::$module . "_lang";
        }
        if (file_exists(APPPATH . "language/" . $expectedLanguage . "/" . $expectedFile . ".php")) {
            $this->lang->load($expectedFile, $expectedLanguage);
        }
    }


    function standard_authorization_restriction($mode) {
        if ($mode == $this->config->item('add')) {
            $authorization = $this->config->item('add');
            $module_restriction = array(
                $this->config->item('superedit'),
            );
        } else if ($mode == $this->config->item('edit')) {
            $authorization = $this->config->item('edit');
            $module_restriction = array(
                $this->config->item('superedit'),
            );
        } else if ($mode == $this->config->item('delete')) {
            $authorization = $this->config->item('delete');
            $module_restriction = array();
        } else if ($mode == $this->config->item('view')) {
            $authorization = $this->config->item('view');
            $module_restriction = array(
                $this->config->item('superedit'),
                $this->config->item('edit'),
            );
        } else { //if ($mode == $this->config->item('list')) {}
            $authorization = $this->config->item('manage');
            $module_restriction = array(
                $this->config->item('add'),
                $this->config->item('superedit'),
                $this->config->item('edit'),
                $this->config->item('delete'),
                $this->config->item('view'),
            );
        }
        $this->inv_authorization($authorization);
        $this->inv_module_restriction($module_restriction);
    }

    function transaction_authorization_restriction($mode) {
        if ($mode == $this->config->item('add')) {
            $authorization = $this->config->item('add');
            $module_restriction = array(
                $this->config->item('superedit'),
            );
        } else if ($mode == $this->config->item('edit')) {
            $authorization = $this->config->item('edit');
            $module_restriction = array(
                $this->config->item('superedit'),
            );
        } else if ($mode == $this->config->item('delete')) {
            $authorization = $this->config->item('delete');
            $module_restriction = array();
        } else if ($mode == $this->config->item('payment')) {
            $authorization = $this->config->item('payment');
            $module_restriction = array();
        } else if ($mode == $this->config->item('close')) {
            $authorization = $this->config->item('close');
            $module_restriction = array();
        } else if ($mode == $this->config->item('unclose')) {
            $authorization = $this->config->item('unclose');
            $module_restriction = array();
        } else if ($mode == $this->config->item('view')) {
            $authorization = $this->config->item('view');
            $module_restriction = array();
        } else { //if ($mode == $this->config->item('list')) {}
            $authorization = $this->config->item('manage');
            $module_restriction = array(
                $this->config->item('add'),
                $this->config->item('superedit'),
                $this->config->item('edit'),
                $this->config->item('delete'),
                $this->config->item('view'),
                $this->config->item('payment'),
                $this->config->item('close'),
                $this->config->item('unclose'),
            );
        }
        $this->inv_authorization($authorization);
        $this->inv_module_restriction($module_restriction);
    }

    function print_invoice($id) {
        $this->get_single_data($id);
        generate_invoice(MY_Controller::$module . "_invoice", MY_Controller::$folder, "L", "A5");
    }

    function get_list_data() {}

    function get_single_data($id) {}

    function get_structure() {
        $structures = curl_request("GET", $this->config->item('backend_server_url') . MY_Controller::$module . '/get_structure/', jwt_auth_header());
        return json_decode($structures, TRUE);
    }

    function get_display_list() {
        $structures = curl_request("GET", $this->config->item('backend_server_url') . MY_Controller::$module . '/get_display_list/', jwt_auth_header());
        return json_decode($structures, TRUE);
    }

    function get_post_data($mode) {
        return array();
    }

    function get_database_data() {
        return array();
    }

    function get_search_options() {}

    /* --- database & data management --- */

    /* --- CRUD management --- */

    function index() {
        $redirect_buffer = "";
        foreach (MY_Controller::$search_field as $search_field) {
            $redirect_buffer .= "/" . $search_field . "/~";
        }
        $this->session->set_flashdata('message', $this->session->flashdata('message'));
        $this->session->set_flashdata('notification', $this->session->flashdata('notification'));
        redirect(MY_Controller::$module . "/management/offset/" . $this->config->item('default_offset') . $redirect_buffer);
    }

    function management() {
      $mode = $this->config->item('list');
      MY_Controller::standard_basic_management($mode);
      $loader_parameters = array(
        'structure' => $this->get_structure(),
        'columns' => $this->get_display_list(),
        'view_params' => array(
          'mode' => $mode,
          'parent_module' => MY_Controller::$navigation_parent,
          'module' => MY_Controller::$module,
          'module_folder' => MY_Controller::$folder,
          'view' => '_default_list',
          'use_form_validation' => false,
          'use_form_pagination' => true,
          'use_select2' => true,
          'modals' => array('_content_modal_delete.php'),
          'form_add' => $this->config->item('add'),
          'offset' => $this->data['offset'],
          'offset_parameters' => $this->data['offset_parameter_buffer'],
          'search_parameters' => $this->data['search_parameter_buffer'],
        ),
      );
      inv_app_loader($loader_parameters);
    }

    function search_form() {
        parameter_manager(MY_Controller::$search_field);
        redirect(MY_Controller::$module . "/management/" . $this->data['offset_parameter_buffer'] . "/" . $this->data['search_parameter_buffer']);
    }

    function add() {
      $mode = $this->config->item('add');
      MY_Controller::standard_basic_management($mode);
      $this->data['structures'] = $this->get_structure();
      $loader_parameters = array(
        'structure' => $this->data['structures'],
        'view_params' => array(
          'mode' => $mode,
          'parent_module' => MY_Controller::$navigation_parent,
          'module' => MY_Controller::$module,
          'module_folder' => MY_Controller::$folder,
          'form_submit' => true,
          'use_maxlength' => true,
          'use_datepicker' => true,
          'use_select2' => true,
          'use_image' => MY_Controller::$use_image,
          'use_custom_js_module' => '_default_add_edit',
          'modals' => array('_content_modal_normal.php'),
          'offset_parameters' => $this->data['offset_parameter_buffer'],
          'search_parameters' => $this->data['search_parameter_buffer'],
          'advance_parameters' => $this->data['advance_parameter_buffer'],
          'view' => '_default_add_edit',
        ),
      );
      inv_app_loader($loader_parameters);
    }

    function edit() {
      $mode = $this->config->item('edit');
      MY_Controller::standard_basic_management($mode);
      $this->data['structures'] = $this->get_structure();
      $loader_parameters = array(
        'structure' => $this->data['structures'],
        'view_params' => array(
          'mode' => $mode,
          'parent_module' => MY_Controller::$navigation_parent,
          'module' => MY_Controller::$module,
          'module_folder' => MY_Controller::$folder,
          'form_submit' => true,
          'use_maxlength' => true,
          'use_datepicker' => true,
          'use_select2' => true,
          'use_image' => MY_Controller::$use_image,
          'offset' => $this->data['offset'],
          'offset_parameters' => $this->data['offset_parameter_buffer'],
          'search_parameters' => $this->data['search_parameter_buffer'],
          'advance_parameters' => $this->data['advance_parameter_buffer'],
          'view' => '_default_add_edit',
          'use_custom_js_module' => '_default_add_edit',
        ),
      );
      inv_app_loader($loader_parameters);
    }

    function view() {
      $mode = $this->config->item('view');
      MY_Controller::standard_basic_management($mode);
      $this->data['structures'] = $this->get_structure();
      /* --- view management --- */
      $loader_parameters = array(
        'view_params' => array(
          'mode' => $mode,
          'parent_module' => MY_Controller::$navigation_parent,
          'module' => MY_Controller::$module,
          'module_folder' => MY_Controller::$folder,
          'offset' => $this->data['offset'],
          'offset_parameters' => $this->data['offset_parameter_buffer'],
          'search_parameters' => $this->data['search_parameter_buffer'],
          'view' => '_default_view',
          'use_custom_js_module' => '_default_view',
        ),
      );
      inv_app_loader($loader_parameters);
      /* --- view management --- */
    }

    function standard_basic_management($mode) {
        if ($mode == $this->config->item('list')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller::$search_field);
            inv_app_show_notification(MY_Controller::$module);
            $this->get_list_data();
            $this->get_search_options();
        } else if ($mode == $this->config->item('add')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller::$search_field);
            validator($this->get_structure(), $mode);
        } else if ($mode == $this->config->item('edit')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller::$search_field);
            validator($this->get_structure(), $mode);
        } else if ($mode == $this->config->item('delete') ||
                $mode == $this->config->item('cancel') ||
                $mode == $this->config->item('close') ||
                $mode == $this->config->item('unclose')) {
            parameter_manager(MY_Controller::$search_field);
            $this->standard_authorization_restriction($mode);
        } else if ($mode == $this->config->item('view')) {
            parameter_manager(MY_Controller::$search_field);
            $this->standard_authorization_restriction($mode);
        } else {
            parameter_manager(MY_Controller::$search_field);
            $this->standard_authorization_restriction($mode);
            if(isset(MY_Controller::$default_id)){
              $this->get_single_data($this->data[MY_Controller::$default_id]);
            } else {
              $this->get_single_data($this->data['id']);
            }
            if (empty($this->data[MY_Controller::$module])) {
                $this->flash_management(array(), true);
                redirect($this->get_standard_redirect_url());
            }
        }
    }

    /* --- CRUD management --- */

}
