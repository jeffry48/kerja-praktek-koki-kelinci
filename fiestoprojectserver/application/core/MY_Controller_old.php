<?php

class MY_Controller_old extends CI_Controller {

    static $module = "controller";
    static $identifier = "controller"; /* database field that identify this module */
    static $module_prefix = ""; //3 chars prefix for code
    static $folder = "backend/"; /* backend/ or frontend/ */
    static $use_image = false; /* blank if this module use no photo */
    static $use_custom_js_module = ""; /* blank if this module use no photo */
    //static $use_custom_sort = "";
    //static $use_custom_filter = "";
    static $navigation_parent = "master_data"; /* for breadcrumbs and navigation */
    static $search_field = array("search");
    static $session_name = "";
    static $use_quantity = true;
    static $check_quantity_on_add_detail = false;
    static $allow_duplicate_items = false;
    static $use_payment = false;
    static $use_api = false;
    static $quantity_adjust_operator = "";
    static $quantity_reset_operator = "";
    static $base_model = "";
    static $base_detail_model = "";
    static $base_detail_log_name = "";
    static $base_fifo_master_model = "";
    static $base_fifo_master_field = "";
    static $base_fifo_detail_model = "";
    static $base_fifo_detail_add = true;
    static $base_fifo_detail_reference_quantity_field = "";
    static $base_fifo_detail_quantity_field = "";
    static $base_fifo_detail_master_quantity_field = "";
    static $base_fifo_detail_reference = "";
    static $base_fifo_detail_reference_target = "";
    static $base_payment_model = "";
    static $base_payment_field = "";

    function __construct() {
        parent::__construct();
        $this->load->model('requirement_model');
        $this->load->model('payment_method_model');
        /* No Cache Options */
        //$this->browsercache->cacheFor(0); //Cache a page for 0 minutes
        //$this->browsercache->dontCache(); //Prevent a page from being cached
        /* Verify logged in status. */
        if (!get_active_session()) {
            redirect('/', 'refresh');
        } else {
            $this->data['maintenance_setting'] = get_maintenance_setting();
            $this->data['session_data'] = get_active_session();
        }
    }

    /* --- controller helper --- */

    function combobox_required($value) {
        combobox_required_helper($value);
    }

    function inv_authorization($page) {
        if (link_restriction($page . "_" . MY_Controller_old::$module)) {
            redirect('unauthorized', 'refresh');
        }
    }

    function inv_module_restriction($actions, $restriction = 'forbidden') {
        foreach ($actions as $action) {
            if (link_restriction($action . "_" . MY_Controller_old::$module)) {
                $this->data[$restriction . "_" . $action] = true;
            } else {
                $this->data[$restriction . "_" . $action] = false;
            }
        }
    }

    function flash_management($result, $empty = false) {
        if ($empty) {
            $this->session->set_flashdata('message', $this->lang->line('notification_no_' . MY_Controller_old::$module . '_found'));
            $this->session->set_flashdata('notification', $this->config->item('error'));
        } else {
            $this->session->set_flashdata('message', $result['message']);
            $this->session->set_flashdata('notification', $result['notification']);
        }
    }

    function get_standard_redirect_url() {
        return MY_Controller_old::$module . "/management/" . $this->data['offset_parameter_buffer'] . "/" . $this->data['search_parameter_buffer'];
    }

    function get_custom_redirect_url($function_name) {
        return MY_Controller_old::$module . "/" . $function_name . "/" . $this->data['offset_parameter_buffer'] . "/" . $this->data['advance_parameter_buffer'] . "/" . $this->data['search_parameter_buffer'];
    }

    function strip_search_parameters() {
        foreach (MY_Controller_old::$search_field as $search_field) {
            if (isset($this->data[$search_field]) && $this->data[$search_field] == "~") {
                $this->data[$search_field] = "";
            }
        }
    }

    function lang_loader($expectedLanguage = "global", $expectedFile = "") {
        if ($expectedFile == "") {
            $expectedFile = MY_Controller_old::$module . "_lang";
        }
        if (file_exists(APPPATH . "language/" . $expectedLanguage . "/" . $expectedFile . ".php")) {
            $this->lang->load($expectedFile, $expectedLanguage);
        }
    }

    function upload_image($module, $image_field_name, $resize_width, $resize_height, $crop_width, $crop_height) {
        $message = "";
        $notification = "";
        $filename = $this->data['photo_name'];
        $path = $this->config->item('default_base_image_folder_url') . $this->config->item('default_' . $module . '_image_url');
        //$image_upload_result = image_upload_thumbnail($filename, $path, $image_field_name, $resize_width, $resize_height, $crop_width, $crop_height);
        $image_upload_result = image_upload_resize($filename, $path, $image_field_name, $resize_width, $resize_height, $crop_width, $crop_height);
        $image_upload_success = $image_upload_result['result'];
        if (!$image_upload_success) {
            $message = $image_upload_result['errors'];
            $notification = $this->config->item('error');
        } else {
            $notification = $this->config->item('success');
        }

        return array(
            'result' => $image_upload_success,
            'message' => $message,
            'notification' => $notification
        );
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
            $module_restriction = array();
        } else if ($mode == $this->config->item('cancel')) {
            $authorization = $this->config->item('cancel');
            $module_restriction = array();
        } else if ($mode == $this->config->item('open')) {
            $authorization = $this->config->item('open');
            $module_restriction = array();
        } else if ($mode == $this->config->item('close')) {
            $authorization = $this->config->item('close');
            $module_restriction = array();
        } else if ($mode == $this->config->item('pay')) {
            $authorization = $this->config->item('pay');
            $module_restriction = array(
                $this->config->item('pay_delete'),
            );
        } else {
            $authorization = $this->config->item('manage');
            $module_restriction = array(
                $this->config->item('add'),
                $this->config->item('superedit'),
                $this->config->item('edit'),
                $this->config->item('delete'),
                $this->config->item('view'),
                $this->config->item('open'),
                $this->config->item('close'),
                $this->config->item('cancel'),
                $this->config->item('pay'),
            );
        }
        $this->inv_authorization($authorization);
        $this->inv_module_restriction($module_restriction);
    }

    function print_invoice($id) {
        $this->get_single_data($id);
        generate_invoice(MY_Controller_old::$module . "_invoice", MY_Controller_old::$folder, "L", "A5");
    }

    /* --- controller helper --- */

    /* --- form validation --- */

    function standard_validation() {
        if (MY_Controller_old::$use_image) {
            return $this->standard_validation_with_image();
        } else {
            return $this->standard_validation_no_image();
        }
    }

    function standard_validation_no_image() {
        $is_validated = false;
        if ($this->form_validation->run() == true) {
            $is_validated = true;
        }
//        if ($is_validated) {
//            die("standard_validation_no_image TRUE");
//        } else {
//            die("standard_validation_no_image FALSE");
//        }
        return $is_validated;
    }

    function standard_validation_with_image() {
        $is_image_validated = true;
        $is_validated = false;
        if (isset($this->data['form_images_validation'])) {
            foreach ($this->data['form_images_validation'] as $form_image) {
                if (isset($_FILES[$form_image]) && $_FILES[$form_image]['name'] != "") {
                    $is_image_validated = true;
                } else {
                    $is_image_validated = false;
                    break;
                }
            }
        }
        if ($this->form_validation->run() == true) {
            $is_validated = true;
        }
        return $is_image_validated && $is_validated;
    }

    /* --- form validation --- */

    /* --- database & data management --- */

    function get_list_data() {
        /* --- can be override on custom controller --- */
        $this->strip_search_parameters();
        $this->data['list_data'] = MY_Controller_old::$base_model->get_all($this->data['offset'], $this->data['search']);
        $this->data['total_rows'] = MY_Controller_old::$base_model->get_num_rows($this->data['search']);
    }

    function get_single_data($id) {
        /* --- can be override on custom controller --- */
        $this->data['single_data'] = MY_Controller_old::$base_model->get_single_by_field($id);
        if (MY_Controller_old::$use_api) {
            $this->data['multi_details'] = MY_Controller_old::$base_detail_model->get_all_by_field(-1, $id);
            if (MY_Controller_old::$use_payment) {
                $this->data['multi_payments'] = MY_Controller_old::$base_payment_model->get_all_by_module_field(-1, $id, MY_Controller_old::$module);
            }
        }
    }

    function get_additional_js() {
        return array();
    }

    function get_structure() {
        if (count($this->get_main_structure()) > 0) {
            foreach ($this->get_main_structure() as $single) {
                $structure[] = $single;
            }
        }
        if (count($this->get_detail_structure()) > 0) {
            foreach ($this->get_detail_structure() as $single) {
                $single['detail_structure'] = true;
                $structure[] = $single;
            }
        }
        return $structure;
    }

    function get_fifo_detail_structure() {
        
    }

    function get_main_structure() {
        return array(
            array(
                'name' => 'name',
                'type' => $this->config->item('form_textfield'),
                'required' => true,
                'superedit' => true,
            ),
        );
    }

    function get_detail_structure() {
        return array();
    }

    function get_payment_structure() {
        $payment_methods = $this->payment_method_model->get_all();

        $post_payment_method = $this->input->post('payment_method');
        if (isset($post_payment_method)) {
            $selected_payment_method = $this->input->post('payment_method');
        } else {
            $selected_payment_method = "0";
        }

        return array(
            array(
                'name' => 'date',
                'type' => $this->config->item('form_datefield'),
                'data_type' => 'date',
                'detail_width' => "20", //in %
                'required' => true,
                'default' => inv_get_today_date_view(),
                'class' => "datepicker-no-backdate"
            ),
            array(
                'name' => 'payment_method',
                'type' => $this->config->item('form_combobox'),
                'detail_width' => "20", //in %
                'required' => true,
                'master' => $payment_methods, //selected data from database
                'first_option' => $this->lang->line('option_select_one'), //type to add first option
                'first_option_id' => 0, //set id for first option (optional)
                'id' => 'id', //field name in selected data from database for id
                'values' => 'name', //field name in selected data from database, 
                //use 'name' to show single value in combobox,
                //use dollar sign '$price' to show single value with currency sign in combobox
                //use | 'group|name|$price' to show multiple values in combobox
                'delimiter' => "-", //delimiter used for multiple values
                'selected' => $selected_payment_method, //selected id,
            ),
            array(
                'name' => 'amount',
                'type' => $this->config->item('form_textfield'),
                'detail_width' => "20", //in %
                'class' => 'thousand',
                'attribute' => 'min="0"', //no negative numbers
                'max_length' => '13',
                'data_type' => 'number',
                'no_max_length' => true,
                'required' => true,
                'default' => "0",
            ),
            array(
                'name' => 'short_notes',
                'type' => $this->config->item('form_textfield'),
                'max_length' => '50',
                'detail_width' => "40", //in %
                'rows' => 2,
            ),
        );
    }

    function get_list_display() {
        return array(
            array(
                'name' => 'name',
                'db_value' => 'name',
            ),
        );
    }

    function get_view_display() {
        return array(
            array(
                'name' => 'name',
                'db_value' => 'name',
            ),
        );
    }

    function get_detail_display() {
        return array();
    }

    function get_payment_display() {
        /* @override */
        return array(
            array(
                'name' => 'date',
                'value' => 'date',
                'data_type' => 'date',
                'detail_width' => "20", //in %
            ),
            array(
                'name' => 'amount',
                'value' => 'amount',
                'data_type' => 'number',
                'detail_width' => "20", //in %
                'highlight' => true, //to show in modal name
            ),
            array(
                'name' => 'payment_method',
                'value' => 'payment_method_name',
                'detail_width' => "20", //in %,
            ),
            array(
                'name' => 'short_notes',
                'value' => 'short_notes',
                'detail_width' => "40", //in %
            ),
        );
    }

    function get_view_summary_display() {
        return array(
        );
    }

    function get_list_actions() {
        return array(
            $this->config->item('view') => array(
                'type' => $this->config->item('action_open'),
                'icon' => 'fa fa-eye',
            ),
            $this->config->item('edit') => array(
                'type' => $this->config->item('action_open'),
                'icon' => 'fa fa-edit',
            ),
            $this->config->item('delete') => array(
                'type' => $this->config->item('action_modal'),
                'icon' => 'fa fa-remove',
            ),
        );
    }

    function get_payment_actions() {
        return array(
            $this->config->item('pay_delete') => array(
                'type' => $this->config->item('action_modal'),
                'icon' => 'fa fa-remove',
                'additional_params' => array(
                    'payment_id' => 'id'
                ),
            ),
        );
    }

    function adjust_quantity($adjust_quantity, $single_data) {
        if (MY_Controller_old::$quantity_adjust_operator == "+") {
            if (is_array($single_data)) {
                return $adjust_quantity + $this->get_adjust_quantity($single_data);
            } else {
                return $adjust_quantity + $single_data;
            }
        } else if (MY_Controller_old::$quantity_adjust_operator == "-") {
            if (is_array($single_data)) {
                return $adjust_quantity - $this->get_adjust_quantity($single_data);
            } else {
                return $adjust_quantity - $single_data;
            }
        } else {
            return 0;
        }
    }

    function reset_quantity($adjust_quantity, $single_data) {
        if (MY_Controller_old::$quantity_adjust_operator == "+") {
            if (is_array($single_data)) {
                return $adjust_quantity - $this->get_adjust_quantity($single_data);
            } else {
                return $adjust_quantity - $single_data;
            }
        } else if (MY_Controller_old::$quantity_adjust_operator == "-") {
            if (is_array($single_data)) {
                return $adjust_quantity + $this->get_adjust_quantity($single_data);
            } else {
                return $adjust_quantity + $single_data;
            }
        } else {
            return 0;
        }
    }

    function get_post_data($session_name = "") {
        $log_name = "";
        $post_data = array();
        $module_details = array();
        $deleted_module_details = array();
        //harus bedakan kalo use_api ambil dari session bukan get_structure
        if (MY_Controller_old::$use_api) {
            $module_session = get_session(MY_Controller_old::$session_name);
            $module_details = $module_session[MY_Controller_old::$module . "_" . $session_name];
            foreach ($module_details as $single) {
                foreach ($this->get_detail_structure() as $single_structure) {
                    if (isset($single_structure['formula']) && $single_structure['formula'] != "") {
                        if (!isset($post_data[$single_structure['sum']])) {
                            $post_data[$single_structure['sum']] = 0;
                        }
                        $post_data[$single_structure['sum']] = $post_data[$single_structure['sum']] + calculate_formula($single, $single_structure['formula']);
                    }
                }
            }
            if (isset($module_session["deleted_db_items"])) {
                $deleted_module_details = $module_session["deleted_db_items"];
            }
        }
        foreach ($this->get_main_structure() as $single) {
            if (MY_Controller_old::$use_api) {
                $data = $module_session[$single['name']];
                if ($single['type'] == $this->config->item('form_combobox')) {
                    $log_name = $module_session[$single['name'] . "_name"];
                }
            } else {
                $data = $this->input->post($single['name']);
            }

            if ($single['type'] == $this->config->item('form_checkbox')) {
                if ($data == "") {
                    $data = 0;
                }
            }
            if (isset($single['data_type'])) {
                if ($single['data_type'] == "number" || $single['type'] == "decimal") {
                    $data = inv_strip_thousand_separator($data);
                } else if ($single['data_type'] == "date") {
                    $data = inv_date_format_db($data);
                } else if ($single['data_type'] == "datetime") {
                    $data = inv_datetime_format_db($data);
                }
            }
            $post_data[$single['name']] = $data;
        }
        return array(
            'log_name' => $log_name,
            'data' => $post_data,
            'details' => $module_details,
            'deleted_details' => $deleted_module_details
        );
    }

    function get_database_data() {
        $database_data = array();
        foreach ($this->get_main_structure() as $single) {
            $database_data[$single['name']] = $this->data['single_data'][$single['name']];
        }
        if (MY_Controller_old::$use_api) {
            $module_details = MY_Controller_old::$base_detail_model->get_all_by_field(-1, $this->data['id']);
            foreach ($module_details as $single) {
                foreach ($this->get_detail_structure() as $single_structure) {
                    if (isset($single_structure['formula']) && $single_structure['formula'] != "") {
                        if (!isset($database_data[$single_structure['sum']])) {
                            $database_data[$single_structure['sum']] = 0;
                        }
                        $database_data[$single_structure['sum']] = $database_data[$single_structure['sum']] + calculate_formula($single, $single_structure['formula']);
                    }
                }
            }
        } else {
            $module_details = array();
        }
        return array(
            'data' => $database_data,
            'details' => $module_details
        );
    }

    function get_search_options() {
        /* --- can be override on custom controller --- */
    }

    /* --- database & data management --- */

    /* --- CRUD management --- */

    function build_title($log_name, $data) {
        if ($log_name == "") {
            return $this->lang->line('module_' . MY_Controller_old::$module) . " '" . $data[MY_Controller_old::$identifier] . "'"; //name or title of current item
        } else {
            return $this->lang->line('module_' . MY_Controller_old::$module) . " '" . $log_name . "'"; //name or title of current item
        }
    }

    function index() {
        $redirect_buffer = "";
        foreach (MY_Controller_old::$search_field as $search_field) {
            $redirect_buffer .= "/" . $search_field . "/~";
        }
        $this->session->set_flashdata('message', $this->session->flashdata('message'));
        $this->session->set_flashdata('notification', $this->session->flashdata('notification'));
        redirect(MY_Controller_old::$module . "/management/offset/" . $this->config->item('default_offset') . $redirect_buffer);
    }

    function search_form() {
        parameter_manager(MY_Controller_old::$search_field);
        redirect(MY_Controller_old::$module . "/management/" . $this->data['offset_parameter_buffer'] . "/" . $this->data['search_parameter_buffer']);
    }

    function standard_basic_management($mode) {
        $this->data['mode'] = $mode;
        if ($mode == $this->config->item('list')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller_old::$search_field);
            inv_app_show_notification(MY_Controller_old::$module);
            $this->get_list_data();
            $this->get_search_options();
        } else if ($mode == $this->config->item('add')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller_old::$search_field);
            validator($this->get_structure(), $mode, MY_Controller_old::$base_model);
        } else if ($mode == $this->config->item('edit')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller_old::$search_field);
            validator($this->get_structure(), $mode, MY_Controller_old::$base_model);
            $this->get_single_data($this->data['id']);
            if (empty($this->data['single_data'])) {
                $this->flash_management(array(), true);
                redirect($this->get_standard_redirect_url());
            }
        } else if ($mode == $this->config->item('delete') ||
                $mode == $this->config->item('cancel') ||
                $mode == $this->config->item('close') ||
                $mode == $this->config->item('open')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller_old::$search_field);
            $this->data['id'] = $this->input->post('id');
            $this->get_single_data($this->data['id']);
            if (empty($this->data['single_data'])) {
                $this->flash_management(array(), true);
                redirect($this->get_standard_redirect_url());
            }
        } else if ($mode == $this->config->item('view')) {
            parameter_manager(MY_Controller_old::$search_field);
            $this->get_single_data($this->data['id']);
            if (empty($this->data['single_data'])) {
                $this->flash_management(array(), true);
                redirect($this->get_standard_redirect_url());
            }
        } else if ($mode == $this->config->item('pay')) {
            $this->standard_authorization_restriction($mode);
            parameter_manager(MY_Controller_old::$search_field);
            validator($this->get_payment_structure(), $mode, MY_Controller_old::$base_model);
            $this->get_single_data($this->data['id']);
            if (empty($this->data['single_data'])) {
                $this->flash_management(array(), true);
                redirect($this->get_standard_redirect_url());
            }
        } else if ($mode == $this->config->item('dashboard')) {
            
        } else {
            parameter_manager(MY_Controller_old::$search_field);
            $this->standard_authorization_restriction($mode);
            $this->get_single_data($this->data['id']);
            if (empty($this->data['single_data'])) {
                $this->flash_management(array(), true);
                redirect($this->get_standard_redirect_url());
            }
        }
    }

    function management() {
        $this->clear_session();
        $mode = $this->config->item('list');
        $this->standard_basic_management($mode);
        $this->data['list_display'] = $this->get_list_display();
        $this->data['list_actions'] = $this->get_list_actions();

        /* --- view management --- */
        $loader_parameters = array(
            'structure' => $this->get_structure(),
            'model' => MY_Controller_old::$base_model,
            'master_data' => array(
                'list_data' => $this->data['list_data'],
                'total_rows' => $this->data['total_rows'],
            ),
            'view_params' => array(
                'mode' => $mode,
                'parent_module' => MY_Controller_old::$navigation_parent,
                'module' => MY_Controller_old::$module,
                'module_folder' => MY_Controller_old::$folder,
                'use_form_validation' => false,
                'use_form_search' => false,
                'use_form_pagination' => true,
                'modals' => array('_content_modal_action.php'),
                'form_add' => $this->config->item('add'),
                'hide_form_navigation' => true,
                'use_maxlength' => true,
                'use_datepicker' => false,
                'use_monthpicker' => false,
                'use_select2' => false,
                'use_summernote' => false,
                'use_image' => MY_Controller_old::$use_image,
                'offset' => $this->data['offset'],
                'offset_parameters' => $this->data['offset_parameter_buffer'],
                'search_parameters' => $this->data['search_parameter_buffer'],
                'view' => '_default_form_list'
            ),
        );
        inv_app_loader($loader_parameters);
        /* --- view management --- */

        /* --- search management --- */
        $this->get_search_options();
        /* --- search management --- */
    }

    function add() {
        $mode = $this->config->item('add');
        $this->standard_basic_management($mode);
        $this->data['detail_structure'] = $this->get_detail_structure();
        $listed_additional_js = $this->get_additional_js();
        if (isset($listed_additional_js[$mode])) {
            $additional_js = $listed_additional_js[$mode];
        } else {
            $additional_js = array();
        }
        $validation = $this->standard_validation();
        if ($validation) {
            $this->data['code'] = MY_Controller_old::$base_model->get_auto_increment_value();
            $this->standard_basic_add();

            redirect($this->get_standard_redirect_url());
        } else {
            /* --- view management --- */
            $loader_parameters = array(
                'structure' => $this->get_structure(),
                'model' => MY_Controller_old::$base_model,
                'view_params' => array(
                    'mode' => $mode,
                    'parent_module' => MY_Controller_old::$navigation_parent,
                    'module' => MY_Controller_old::$module,
                    'module_folder' => MY_Controller_old::$folder,
                    'use_form_validation' => true,
                    'form_submit' => true,
                    'use_maxlength' => true,
                    'use_datepicker' => true,
                    'use_monthpicker' => false,
                    'use_select2' => true,
                    'use_summernote' => false,
                    'use_image' => MY_Controller_old::$use_image,
                    'additional_js' => $additional_js,
                    'offset_parameters' => $this->data['offset_parameter_buffer'],
                    'search_parameters' => $this->data['search_parameter_buffer'],
                    'advance_parameters' => $this->data['advance_parameter_buffer'],
                    'view' => '_default_form_add_edit'
                ),
            );
            inv_app_loader($loader_parameters);
            /* --- view management --- */
        }
    }

    function standard_basic_add() {
        if (MY_Controller_old::$use_image) {
            foreach ($this->data['form_images'] as $form_image) {
                /* image management */
                if (isset($_FILES[$form_image]) && $_FILES[$form_image]['name'] != "") {
                    $photo_name = $_FILES[$form_image]['name'];
                    $extension = pathinfo($photo_name, PATHINFO_EXTENSION);
                    $this->data['photo_name'] = str_replace(".", "_", $this->data['code']) . "_" . date('His') . ".$extension";
                    /*
                     * $resize_width, $resize_height, $crop_widh, $crop_height
                     * no resize / no crop = -1
                     * percentage resize / crop = 0 - 1
                     * pixels resize / crop = >1
                     */
                    $resize_width = $this->config->item('resize_width');
                    $resize_height = $this->config->item('resize_height');
                    $crop_width = $this->config->item('crop_width'); //thumbnail
                    $crop_height = $this->config->item('crop_height'); //thumbnail
                    $image_upload_result = $this->upload_image(MY_Controller_old::$module, $form_image, $resize_width, $resize_height, $crop_width, $crop_height);
                    $this->flash_management($image_upload_result);
                    //$image_upload_success = $image_upload_result['result'];
                } else {
                    $result = array(
                        'message' => $this->lang->line('notification_no_file_to_upload'),
                        'notification' => $this->config->item('error')
                    );
                    $this->flash_management($result);
                }
                /* image management */
            }
        }
        /* server management */
        $result = $this->add_data();
        $this->flash_management($result);
        /* server management */
    }

    function add_data($session_name = "detail") {
        $post_data = $this->get_post_data($session_name);
        $code = MY_Controller_old::$base_model->get_column_max_length("code");
        $main_data = $post_data['data'];
        if ($code > 0) {
            $main_data['code'] = inv_generate_code(MY_Controller_old::$module_prefix);
        }
        $module_details = $post_data['details'];
        $title = $this->build_title($post_data['log_name'], $main_data);
        /* add main to database */
        $main_data['id'] = MY_Controller_old::$base_model->insert($main_data, $title);
        /* add main to database */
        if (count($module_details) > 0) {
            foreach ($module_details as $single_module_detail) {
                $this->add_module_detail($main_data['id'], $single_module_detail);
            }
        }

        return array(
            'message' => $title . $this->lang->line('notification_success_add'),
            'notification' => $this->config->item('success')
        );
    }

    function add_module_detail($parent_id, $single_module_detail) {
        /* add details to database */
        $detail_data = array(
            MY_Controller_old::$module => $parent_id,
        );
        foreach ($this->get_detail_structure() as $single_detail) {
            $detail_data[$single_detail['name']] = $single_module_detail[$single_detail['name']];
        }
        $sub_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (detail) '" . $single_module_detail['log_name'] . "'"; //name or title of current item
        $single_module_detail[MY_Controller_old::$module . '_detail'] = MY_Controller_old::$base_detail_model->insert($detail_data, $sub_title);
        /* add details to detail database */

        if (MY_Controller_old::$use_quantity) {
            /* add details to fifo database */
            $item_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (item) '" . $single_module_detail['log_name'] . "'"; //name or title of current item
            if (MY_Controller_old::$base_fifo_detail_add) { //true for add, false for update
                $fifo_detail_data = array();
                foreach ($this->get_fifo_detail_structure() as $single_quantity_detail) {
                    if (isset($single_quantity_detail['model'])) {
                        $db_data = $this->get_single_data_by_id($single_quantity_detail['model'], $single_module_detail['unit']);
                        if (isset($single_quantity_detail['db_formula'])) {
                            $single_module_detail[$single_quantity_detail['db_formula']] = $db_data[$single_quantity_detail['db_formula']];
                        }
                        if (isset($single_quantity_detail['formula'])) {
                            $fifo_detail_data[$single_quantity_detail['name']] = calculate_formula($single_module_detail, $single_quantity_detail['formula']);
                        }
                    } else {
                        if (isset($single_quantity_detail['value']) && $single_quantity_detail['value'] != "") {
                            $fifo_detail_data[$single_quantity_detail['name']] = $single_module_detail[$single_quantity_detail['value']];
                        } else {
                            $fifo_detail_data[$single_quantity_detail['name']] = $single_quantity_detail['raw_value'];
                        }
                    }
                }
                MY_Controller_old::$base_fifo_detail_model->insert($fifo_detail_data, $item_title);
            } else {
                $fifo_detail_ids = "";
                $params = array();
                foreach ($this->get_fifo_detail_by_params() as $single_param) {
                    $params[$single_param] = $single_module_detail[$single_param];
                }
                $fifo_db_data = MY_Controller_old::$base_fifo_detail_model->get_all_available_by_params($params);
                $adjusted_quantity = $this->get_adjust_quantity($detail_data);
                $fifo_counter = 0;
                while ($adjusted_quantity > 0) {
                    $single_fifo_db_data = $fifo_db_data[$fifo_counter];
                    $fifo_data = MY_Controller_old::$base_fifo_detail_model->get_single_by_field($single_fifo_db_data['id']);
                    $converted_quantity = $single_fifo_db_data['converted_quantity'];
                    if ($adjusted_quantity >= $converted_quantity) {
                        $updated_quantity = $converted_quantity; //converted dipakai semua
                    } else {
                        $updated_quantity = $adjusted_quantity; //converted - adjust karena ada leftover
                    }
                    $adjusted_quantity = $adjusted_quantity - $converted_quantity;
                    $fifo_detail_data = array(
                        'sold_quantity' => $fifo_data['sold_quantity'] + $updated_quantity,
                    );
                    MY_Controller_old::$base_fifo_detail_model->update($single_fifo_db_data['id'], $fifo_detail_data, $item_title);
                    if ($fifo_detail_ids == "") {
                        $fifo_detail_ids .= $single_fifo_db_data['id'];
                    } else {
                        $fifo_detail_ids .= "," . $single_fifo_db_data['id'];
                    }
                    $fifo_counter++;
                }
                //to delete: MY_Controller_old::$base_fifo_detail_model->update($fifo_db_data['id'], $fifo_detail_data, $item_title);
                $base_detail_update = array(
                    MY_Controller_old::$base_fifo_detail_reference => $fifo_detail_ids,
                );
                MY_Controller_old::$base_detail_model->update($single_module_detail[MY_Controller_old::$module . '_detail'], $base_detail_update, $sub_title, false);
            }
            /* add details to fifo database */

            /* update quantity in master database */
            $master_data = MY_Controller_old::$base_fifo_master_model->get_single_by_field($detail_data[MY_Controller_old::$base_fifo_master_field]);
            $master_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (master) '" . $master_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
            $new_master_data = array(
                MY_Controller_old::$base_fifo_detail_master_quantity_field => $this->adjust_quantity($master_data[MY_Controller_old::$base_fifo_detail_master_quantity_field], $single_module_detail),
            );
            MY_Controller_old::$base_fifo_master_model->update($detail_data[MY_Controller_old::$base_fifo_master_field], $new_master_data, $master_title);
            /* update quantity in master database */
        }
    }

    function edit() {
        $mode = $this->config->item('edit');
        $this->standard_basic_management($mode);
        $this->data['detail_structure'] = $this->get_detail_structure();
        $listed_additional_js = $this->get_additional_js();
        if (isset($listed_additional_js[$mode])) {
            $additional_js = $listed_additional_js[$mode];
        } else {
            $additional_js = array();
        }

        if (MY_Controller_old::$use_api) {
            $session_data = get_session(MY_Controller_old::$session_name);
            if (empty($session_data)) {
                $this->populate_data($this->data['single_data']);
                $this->populate_detail_data($this->data['multi_details']);
            }
        }

        $validation = $this->standard_validation();
        if ($validation) {
            $this->standard_basic_edit();

            redirect($this->get_standard_redirect_url());
        } else {
            /* --- view management --- */
            $loader_parameters = array(
                'structure' => $this->get_structure(),
                'model' => MY_Controller_old::$base_model,
                'master_data' => array(
                    'single_data' => $this->data['single_data'],
                ),
                'view_params' => array(
                    'mode' => $mode,
                    'parent_module' => MY_Controller_old::$navigation_parent,
                    'module' => MY_Controller_old::$module,
                    'module_folder' => MY_Controller_old::$folder,
                    'use_form_validation' => true,
                    'form_submit' => true,
                    'use_maxlength' => true,
                    'use_datepicker' => true,
                    'use_monthpicker' => false,
                    'use_select2' => true,
                    'use_summernote' => false,
                    'use_image' => MY_Controller_old::$use_image,
                    'additional_js' => $additional_js,
                    'offset_parameters' => $this->data['offset_parameter_buffer'],
                    'search_parameters' => $this->data['search_parameter_buffer'],
                    'advance_parameters' => $this->data['advance_parameter_buffer'],
                    'view' => '_default_form_add_edit'
                ),
            );
            inv_app_loader($loader_parameters);
            /* --- view management --- */
        }
    }

    function standard_basic_edit() {
        if (MY_Controller_old::$use_image) {
            foreach ($this->data['form_images'] as $form_image) {
                /* image management */
                if (isset($_FILES[$form_image]) && $_FILES[$form_image]['name'] != "") {
                    /*
                     * $resize_width, $resize_height, $crop_widh, $crop_height
                     * no resize / no crop = -1
                     * percentage resize / crop = 0 - 1
                     * pixels resize / crop = >1
                     */
                    $photo_name = $_FILES[$form_image]['name'];
                    $extension = pathinfo($photo_name, PATHINFO_EXTENSION);
                    $this->data['photo_name'] = str_replace(".", "_", $this->data['code']) . "_" . date('His') . ".$extension";
                    $resize_width = $this->config->item('resize_width');
                    $resize_height = $this->config->item('resize_height');
                    $crop_width = $this->config->item('crop_width'); //thumbnail
                    $crop_height = $this->config->item('crop_height'); //thumbnail
                    $image_upload_result = $this->upload_image(MY_Controller_old::$module, $form_image, $resize_width, $resize_height, $crop_width, $crop_height);
                    $this->flash_management($image_upload_result);
                    //$image_upload_success = $image_upload_result['result'];
                } else {
                    $result = array(
                        'message' => $this->lang->line('notification_no_file_to_upload'),
                        'notification' => $this->config->item('error')
                    );
                    $this->flash_management($result);
                }
                /* image management */
            }
        }
        /* server management */
        $result = $this->edit_data();
        $this->flash_management($result);
        /* server management */
    }

    function is_same_array($first_data, $second_data) {
        $is_same_array = true;
        foreach ($this->get_detail_structure() as $single) {
            if ($first_data[$single['name']] != $second_data[$single['name']]) {
                $is_same_array = false;
                break;
            }
        }
        return $is_same_array;
    }

    function data_compare($post_data, $database_data) {
        $data = $post_data['data'];
        $details = $post_data['details'];
        $post_deleted_details = $post_data['deleted_details'];
        $db_data = $database_data['data'];
        $db_details = $database_data['details'];

        $compare_details = array();
        $db_compare_details = array();
        $analyze_details = array();
        $db_analyze_details = array();
        for ($i = 0; $i < count($details); $i++) {
            $compare_details[$i]['id'] = $this->build_detail_id($details[$i]);
            $analyze_details[$i]['id'] = $this->build_detail_id($details[$i]);
            foreach ($this->get_detail_structure() as $single) {
                $compare_details[$i][$single['name']] = $details[$i][$single['name']];
                $analyze_details[$i][$single['name']] = $details[$i][$single['name']];
            }
            $analyze_details[$i]['log_name'] = $details[$i]['log_name'];
            $analyze_details[$i]['db_id'] = "";
        }
        for ($i = 0; $i < count($db_details); $i++) {
            $db_compare_details[$i]['id'] = $this->build_detail_id($db_details[$i]);
            $db_analyze_details[$i]['id'] = $this->build_detail_id($db_details[$i]);
            foreach ($this->get_detail_structure() as $single) {
                $db_compare_details[$i][$single['name']] = $db_details[$i][$single['name']];
                $db_analyze_details[$i][$single['name']] = $db_details[$i][$single['name']];
            }
            $db_analyze_details[$i]['db_id'] = $db_details[$i]['id'];
        }

        $added_details = array();
        $edited_details = array();
        $deleted_details = array();

        /* find deleted details */
        foreach ($db_analyze_details as $single_db) {
            foreach ($post_deleted_details as $single_deleted) {
                if ($single_db['db_id'] == $single_deleted) {
                    $deleted_details[] = $single_db;
                }
            }
        }

        /* find added & edited details */
        foreach ($analyze_details as $single_detail) {
            $is_found = false;
            foreach ($db_analyze_details as $single_db) {
                $single = $single_detail;
                if ($single['id'] == $single_db['id']) {
                    $is_found = true;
                    if (!$this->is_same_array($single, $single_db)) {
                        $id = $single['id'];
                        unset($single['id']);
                        $edited_details[$id]['before'] = $single_db;
                        $edited_details[$id]['after'] = $single;
                        /* on edit detail, cancel delete detail */
                        for ($i = 0; $i < count($deleted_details); $i++) {
                            if ($deleted_details[$i]['db_id'] == $single_db['db_id']) {
                                unset($deleted_details[$i]);
                            }
                        }
                        break;
                    }
                }
            }
            if (!$is_found) {
                $id = $single['id'];
                unset($single['id']);
                $added_details[$id] = $single;
            }
        }

        $edit_action = array();
        $edit_action['added_details'] = $added_details;
        $edit_action['edited_details'] = $edited_details;
        $edit_action['deleted_details'] = $deleted_details;

        ksort($data);
        ksort($db_data);

        if (!array_compare($data, $db_data)) {
            $edit_action['main'] = true; //ready to edit
        } else {
            $edit_action['main'] = false; //no data change
        }
        if (!array_compare($compare_details, $db_compare_details)) {
            $edit_action['detail'] = true; //ready to edit
        } else {
            $edit_action['detail'] = false; //no data change
        }
        return $edit_action;
    }

    function edit_data($session_name = "detail") {
        $post_data = $this->get_post_data($session_name);
        $module_data = $post_data['data'];
        $module_details = $post_data['details'];
        $database_data = $this->get_database_data();
        $title = $this->build_title($post_data['log_name'], $module_data);

        $compare_result = $this->data_compare($post_data, $database_data);
        if (!$compare_result['main'] && !$compare_result['detail']) {
            //die("<br/>edit_data: no data change");
            return array(
                'message' => $this->lang->line('notification_no_data_change'),
                'notification' => $this->config->item('error')
            );
        } else {

            if ($compare_result['main']) {
                $data = $module_data;
            } else {
                $data = array(
                    'id' => $this->data['id'], //for timestamp changes only
                );
            }
            //MY_Controller_old::$base_model->update($this->data['id'], $data, $title);

            if ($compare_result['detail']) {
                $added_details = $compare_result['added_details'];
                $edited_details = $compare_result['edited_details'];
                $deleted_details = $compare_result['deleted_details'];
                if (!empty($deleted_details)) {
                    foreach ($deleted_details as $single_detail) {
                        //$this->delete_module_detail($single_detail);
                    }
                }

                if (!empty($added_details)) {
                    foreach ($added_details as $single_detail) {
                        //$this->add_module_detail($this->data['id'], $single_detail);
                    }
                }

                if (!empty($edited_details)) {
                    foreach ($edited_details as $single_detail) {
                        $this->edit_module_detail($this->data['id'], $single_detail);
                    }
                }
            }
            die("<br/>edit_data: data change");
            return array(
                'message' => $title . $this->lang->line('notification_success_update'),
                'notification' => $this->config->item('success')
            );
        }
    }

    function edit_module_detail($parent_id, $detail) {
        $single_module_detail = $detail['after'];
        $db_id = $detail['before']['db_id'];
        $db_detail = MY_Controller_old::$base_detail_model->get_single_by_field($db_id);
        //check if db_id is in the main
        if ($db_detail[MY_Controller_old::$module] == $parent_id) {
            /* add details to database */
            $detail_data = array();
            foreach ($this->get_detail_structure() as $single_detail) {
                if ($detail['before'][$single_detail['name']] != $detail['after'][$single_detail['name']]) {
                    $detail_data[$single_detail['name']] = $single_module_detail[$single_detail['name']];
                }
            }

            $sub_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (detail) '" . $single_module_detail['log_name'] . "'"; //name or title of current item
            //$single_module_detail[MY_Controller_old::$module . '_detail'] = MY_Controller_old::$base_detail_model->update($db_id, $detail_data, $sub_title);
            $single_module_detail[MY_Controller_old::$module . '_detail'] = 1;
            /* add details to detail database */

            if (MY_Controller_old::$use_quantity) {
                /* add details to fifo database */
                $fifo_detail_data = array();
                if (MY_Controller_old::$base_fifo_detail_add) { //true for add, false for update
                    $params = array(
                        MY_Controller_old::$module . "_detail" => $db_id,
                    );
                    foreach ($this->get_detail_id_session() as $single_param) {
                        $params[$single_param] = $single_module_detail[$single_param];
                    }
                    $fifo_db_data = MY_Controller_old::$base_fifo_detail_model->get_single_by_params($params);
                    foreach ($this->get_fifo_detail_structure() as $single_quantity_detail) {
                        if (isset($single_quantity_detail['model'])) {
                            $db_data = $this->get_single_data_by_id($single_quantity_detail['model'], $single_module_detail['unit']);
                            if (isset($single_quantity_detail['db_formula'])) {
                                $single_module_detail[$single_quantity_detail['db_formula']] = $db_data[$single_quantity_detail['db_formula']];
                            }
                            if (isset($single_quantity_detail['formula'])) {
                                $value = calculate_formula($single_module_detail, $single_quantity_detail['formula']);
                            }
                        } else {
                            if (isset($single_quantity_detail['value']) && $single_quantity_detail['value'] != "") {
                                $value = $single_module_detail[$single_quantity_detail['value']];
                            } else {
                                $value = $single_quantity_detail['raw_value'];
                            }
                        }
                        if ($fifo_db_data[$single_quantity_detail['name']] != $value) {
                            $fifo_detail_data[$single_quantity_detail['name']] = $value;
                        }
                    }
                } else {
                    die();
                }

                if (count($fifo_detail_data) > 0) {
                    $item_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (item) '" . $single_module_detail['log_name'] . "'"; //name or title of current item
                    MY_Controller_old::$base_fifo_detail_model->update($fifo_db_data['id'], $fifo_detail_data, $item_title);
                }
                /* add details to fifo database */

                /* update quantity in master database */
                $master_data = MY_Controller_old::$base_fifo_master_model->get_single_by_field($single_module_detail[MY_Controller_old::$base_fifo_master_field]);
                $master_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (master) '" . $single_module_detail['log_name'] . "'";
                $new_master_data = array(
                    MY_Controller_old::$base_fifo_detail_master_quantity_field => $this->get_adjust_quantity($single_module_detail),
                );
                MY_Controller_old::$base_fifo_master_model->update($master_data['id'], $new_master_data, $master_title);
                /* update quantity in master database */
            }
        }
        die("<br/>edit_module_detail");
    }

    function delete() {
        $mode = $this->config->item('delete');
        $this->standard_basic_management($mode);

        $this->standard_basic_delete();

        redirect($this->get_standard_redirect_url());
    }

    function standard_basic_delete($title = "") {
        /* server management */
        $result = $this->delete_data($title);
        $this->flash_management($result);
        /* server management */
    }

    function delete_data($title = "") {
        if ($title == "") {
            $title = $this->lang->line('module_' . MY_Controller_old::$module) . " '" . $this->data['single_data'][MY_Controller_old::$identifier] . "'"; //name or title of current item
        }
        MY_Controller_old::$base_model->delete($this->data['id'], array(), $title);

        return array(
            'message' => $title . $this->lang->line('notification_success_delete'),
            'notification' => $this->config->item('success')
        );
    }

    function delete_module_detail($single_module_detail) {
        /* delete from details */
        $sub_data = MY_Controller_old::$base_detail_model->get_single_by_field($single_module_detail['db_id']);
        $sub_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (detail) '" . $sub_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
        MY_Controller_old::$base_detail_model->delete($sub_data['id'], array(), $sub_title);
        /* delete from details */

        if (MY_Controller_old::$use_quantity) {
            /* delete from fifo detail */
            $item_data = MY_Controller_old::$base_fifo_detail_model->get_single_by_field($single_module_detail['db_id'], MY_Controller_old::$module . "_detail");
            $item_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (item) '" . $item_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
            if (MY_Controller_old::$base_fifo_detail_add) { //true for add, false for update
                MY_Controller_old::$base_fifo_detail_model->delete($item_data['id'], array(), $item_title);
            } else {
                //MY_Controller_old::$base_fifo_detail_model->update($fifo_detail_data, $item_title);
            }
            /* delete from fifo detail */

            /* update fifo master */
            $master_data = MY_Controller_old::$base_fifo_master_model->get_single_by_field($sub_data[MY_Controller_old::$base_fifo_master_field]);
            $master_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (master) '" . $master_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
            $new_master_data = array(
                MY_Controller_old::$base_fifo_detail_master_quantity_field => $this->reset_quantity($master_data[MY_Controller_old::$base_fifo_detail_master_quantity_field], $single_module_detail),
            );
            MY_Controller_old::$base_fifo_master_model->update($master_data['id'], $new_master_data, $master_title);
            /* update fifo master */
        }
    }

    function view() {
        $mode = $this->config->item('view');
        $this->standard_basic_management($mode);
        $this->data['view_display'] = $this->get_view_display();
        $this->data['detail_display'] = $this->get_detail_display();
        $this->data['payment_display'] = $this->get_payment_display();
        $this->data['view_summary_display'] = $this->get_view_summary_display();

        /* --- view management --- */
        $loader_parameters = array(
            'structure' => $this->get_structure(),
            'model' => MY_Controller_old::$base_model,
            'master_data' => array(
                'single_data' => $this->data['single_data'],
            ),
            'view_params' => array(
                'mode' => $mode,
                'parent_module' => MY_Controller_old::$navigation_parent,
                'module' => MY_Controller_old::$module,
                'module_folder' => MY_Controller_old::$folder,
                'offset' => $this->data['offset'],
                'offset_parameters' => $this->data['offset_parameter_buffer'],
                'search_parameters' => $this->data['search_parameter_buffer'],
                'view' => '_default_form_view'
            ),
        );
        inv_app_loader($loader_parameters);
        /* --- view management --- */
    }

    function pay() {
        $mode = $this->config->item('pay');
        $this->standard_basic_management($mode);
        $this->data['view_display'] = $this->get_view_display();
        $this->data['detail_display'] = $this->get_detail_display();
        $this->data['payment_display'] = $this->get_payment_display();
        $this->data['view_summary_display'] = $this->get_view_summary_display();
        $this->data['payment_actions'] = $this->get_payment_actions();

        $this->data['payment_structure'] = $this->get_payment_structure();
        $listed_additional_js = $this->get_additional_js();
        if (isset($listed_additional_js[$mode])) {
            $additional_js = $listed_additional_js[$mode];
        } else {
            $additional_js = array();
        }

        if (MY_Controller_old::$use_api) {
            $session_data = get_session(MY_Controller_old::$session_name);
            if (empty($session_data)) {
                $this->populate_data($this->data['single_data']);
                $this->populate_detail_data($this->data['multi_details']);
            }
        }

        $validation = $this->standard_validation();
        if ($validation) {
            $this->standard_basic_pay();
            redirect($this->get_custom_redirect_url("pay"));
        } else {
            /* --- view management --- */
            $loader_parameters = array(
                'structure' => $this->get_payment_structure(),
                'model' => MY_Controller_old::$base_model,
                'master_data' => array(
                    'single_data' => $this->data['single_data'],
                ),
                'view_params' => array(
                    'mode' => $mode,
                    'parent_module' => MY_Controller_old::$navigation_parent,
                    'module' => MY_Controller_old::$module,
                    'module_folder' => MY_Controller_old::$folder,
                    'use_form_validation' => true,
                    'form_submit' => true,
                    'use_maxlength' => true,
                    'use_datepicker' => true,
                    'use_monthpicker' => false,
                    'use_select2' => true,
                    'use_summernote' => false,
                    'use_image' => MY_Controller_old::$use_image,
                    'additional_js' => $additional_js,
                    'modals' => array('_content_modal_action.php'),
                    'offset_parameters' => $this->data['offset_parameter_buffer'],
                    'search_parameters' => $this->data['search_parameter_buffer'],
                    'advance_parameters' => $this->data['advance_parameter_buffer'],
                    'view' => '_default_form_pay'
                ),
            );
            inv_app_loader($loader_parameters);
            /* --- view management --- */
        }
    }

    function standard_basic_pay() {
        /* server management */
        $result = $this->pay_data();
        $this->flash_management($result);
        /* server management */
    }

    function pay_data($title = "") {
        $data = array(
            MY_Controller_old::$module => $this->data['id'],
        );
        foreach ($this->get_payment_structure() as $single) {
            $value = $this->input->post($single['name']);
            if ($single['type'] == $this->config->item('form_checkbox')) {
                if ($value == "") {
                    $value = 0;
                }
            }
            if (isset($single['data_type'])) {
                if ($single['data_type'] == "number" || $single['type'] == "decimal") {
                    $value = inv_strip_thousand_separator($value);
                } else if ($single['data_type'] == "date") {
                    $value = inv_date_format_db($value);
                } else if ($single['data_type'] == "datetime") {
                    $value = inv_datetime_format_db($value);
                }
            }
            $data[$single['name']] = $value;
        }
        if ($title == "") {
            $title = $this->lang->line('module_' . MY_Controller_old::$module) . " " . $this->lang->line('label_payment') . " '" . $this->data['single_data'][MY_Controller_old::$identifier] . "'"; //name or title of current item
        }
        MY_Controller_old::$base_payment_model->insert($data, $title);

        /* update total_paid in master database */
        $master_data = MY_Controller_old::$base_model->get_single_by_field($this->data['id']);
        $master_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (" . $this->config->item('add') . " " . strtolower($this->lang->line('label_payment')) . ") '" . $master_data['code'] . "'";
        $new_master_data = array(
            MY_Controller_old::$base_payment_field => $master_data[MY_Controller_old::$base_payment_field] + $data['amount'],
        );
        MY_Controller_old::$base_model->update($this->data['id'], $new_master_data, $master_title);
        /* update total_paid in master database */

        return array(
            'message' => $title . $this->lang->line('notification_success_pay'),
            'notification' => $this->config->item('success')
        );
    }

    function pay_delete() {
        $mode = $this->config->item('pay_delete');
        $this->standard_basic_management($mode);

        $this->standard_basic_pay_delete();

        redirect($this->get_custom_redirect_url("pay"));
    }

    function standard_basic_pay_delete($title = "") {
        /* server management */
        $result = $this->pay_delete_data($title);
        $this->flash_management($result);
        /* server management */
    }

    function pay_delete_data($title = "") {
        parameter_manager(MY_Controller_old::$search_field);
        $data = MY_Controller_old::$base_payment_model->get_single_by_field($this->data['payment_id']);

        if ($title == "") {
            $title = $this->lang->line('module_' . MY_Controller_old::$module) . " " . $this->lang->line('label_payment') . " '" . inv_format_number($data['amount']) . "'"; //name or title of current item
        }
        MY_Controller_old::$base_payment_model->delete($this->data['payment_id'], array(), $title);

        /* update total_paid in master database */
        $master_data = MY_Controller_old::$base_model->get_single_by_field($this->data['id']);
        $master_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (" . $this->config->item('delete') . " " . strtolower($this->lang->line('label_payment')) . ") '" . $master_data['code'] . "'";
        $new_master_data = array(
            MY_Controller_old::$base_payment_field => $master_data[MY_Controller_old::$base_payment_field] - $data['amount'],
        );
        MY_Controller_old::$base_model->update($this->data['id'], $new_master_data, $master_title);
        /* update total_paid in master database */

        return array(
            'message' => $title . $this->lang->line('notification_success_delete'),
            'notification' => $this->config->item('success')
        );
    }

    function cancel() {
        $mode = $this->config->item('cancel');
        $this->standard_basic_management($mode);

        $this->standard_basic_cancel();

        redirect($this->get_standard_redirect_url());
    }

    function standard_basic_cancel($title = "") {
        /* server management */
        $result = $this->cancel_data($title);
        $this->flash_management($result);
        /* server management */
    }

    function cancel_data($title = "") {
        if ($title == "") {
            $title = $this->lang->line('module_' . MY_Controller_old::$module) . " '" . $this->data['single_data'][MY_Controller_old::$identifier] . "'"; //name or title of current item
        }
        $active_session = get_active_session();
        $data = array(
            'status' => $this->config->item('status_cancelled'),
            'processed_by' => $active_session['username'],
            'processed_date' => inv_get_current_datetime_db(),
        );
        MY_Controller_old::$base_model->update($this->data['id'], $data, $title);

        foreach ($this->data['multi_details'] as $single_detail) {
            $single_detail['db_id'] = $single_detail['id'];
            $this->cancel_module_detail($single_detail);
        }
//        die("cancel_data");

        return array(
            'message' => $title . $this->lang->line('notification_success_cancel'),
            'notification' => $this->config->item('success')
        );
    }

    function cancel_module_detail($single_module_detail) {
        /* get data from details */
        $sub_data = MY_Controller_old::$base_detail_model->get_single_by_field($single_module_detail['db_id']);
        /* get data from details */

        if (MY_Controller_old::$use_quantity) {
            /* update fifo detail */
            if (MY_Controller_old::$base_fifo_detail_add) { //true for add, false for update
                $item_data = MY_Controller_old::$base_fifo_detail_model->get_single_by_field($single_module_detail['db_id'], MY_Controller_old::$module . "_detail");
                $item_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (item) '" . $item_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
                $active_session = get_active_session();
                $new_item_data = array(
                    'status' => $this->config->item('status_cancelled'),
                    'processed_by' => $active_session['username'],
                    'processed_date' => inv_get_current_datetime_db(),
                );
                //MY_Controller_old::$base_fifo_detail_model->update($item_data['id'], $new_item_data, $item_title);
            } else {
                $adjusted_quantity = $this->get_adjust_quantity($single_module_detail);
                //update product_item sold_quantity dikurangi quantity sekarang
                $fifo_db_data = MY_Controller_old::$base_fifo_detail_model->get_all_in_params(array(MY_Controller_old::$base_fifo_detail_reference_target => $single_module_detail[MY_Controller_old::$base_fifo_detail_reference]));
                $fifo_counter = 0;
                while ($adjusted_quantity > 0) {
                    $single_fifo_db_data = $fifo_db_data[$fifo_counter];
                    $fifo_data = MY_Controller_old::$base_fifo_detail_model->get_single_by_field($single_fifo_db_data['id']);
                    $converted_quantity = $single_fifo_db_data[MY_Controller_old::$base_fifo_detail_reference_quantity_field];
                    if ($adjusted_quantity >= $converted_quantity) {
                        $updated_quantity = $converted_quantity; //converted dipakai semua
                    } else {
                        $updated_quantity = $adjusted_quantity; //converted - adjust karena ada leftover
                    }
                    $adjusted_quantity = $adjusted_quantity - $converted_quantity;

                    $fifo_detail_data = array(
                        MY_Controller_old::$base_fifo_detail_quantity_field => $this->adjust_quantity($fifo_data[MY_Controller_old::$base_fifo_detail_quantity_field], $updated_quantity),
                    );
                    //print_r($single_fifo_db_data['id'] . ": ");
                    //print_r($fifo_detail_data);
                    //print_r("<br/>");
                    $item_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (item) '" . $single_fifo_db_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
                    MY_Controller_old::$base_fifo_detail_model->update($single_fifo_db_data['id'], $fifo_detail_data, $item_title);
                    $fifo_counter++;
                }
            }
            /* update fifo detail */

            /* update fifo master */
            $master_data = MY_Controller_old::$base_fifo_master_model->get_single_by_field($sub_data[MY_Controller_old::$base_fifo_master_field]);
            $master_title = $this->lang->line('module_' . MY_Controller_old::$module) . " (master) '" . $master_data[MY_Controller_old::$base_detail_log_name] . "'"; //name or title of current item
            $new_master_data = array(
                MY_Controller_old::$base_fifo_detail_master_quantity_field => $this->reset_quantity($master_data[MY_Controller_old::$base_fifo_detail_master_quantity_field], $single_module_detail),
            );
            MY_Controller_old::$base_fifo_master_model->update($master_data['id'], $new_master_data, $master_title);
            /* update fifo master */
        }
    }

    function open() {
        $mode = $this->config->item('open');
        $this->standard_basic_management($mode);

        $this->standard_basic_open();

        redirect($this->get_standard_redirect_url());
    }

    function standard_basic_open($title = "") {
        /* server management */
        $result = $this->open_data($title);
        $this->flash_management($result);
        /* server management */
    }

    function open_data($title = "") {
        if ($title == "") {
            $title = $this->lang->line('module_' . MY_Controller_old::$module) . " '" . $this->data['single_data'][MY_Controller_old::$identifier] . "'"; //name or title of current item
        }
        $active_session = get_active_session();
        $data = array(
            'status' => $this->config->item('status_open'),
            'processed_by' => $active_session['username'],
            'processed_date' => inv_get_current_datetime_db(),
        );
        MY_Controller_old::$base_model->update($this->data['id'], $data, $title);

        return array(
            'message' => $title . $this->lang->line('notification_success_open'),
            'notification' => $this->config->item('success')
        );
    }

    function close() {
        $mode = $this->config->item('close');
        $this->standard_basic_management($mode);

        $this->standard_basic_close();

        redirect($this->get_standard_redirect_url());
    }

    function standard_basic_close($title = "") {
        /* server management */
        $result = $this->close_data($title);
        $this->flash_management($result);
        /* server management */
    }

    function close_data($title = "") {
        if ($title == "") {
            $title = $this->lang->line('module_' . MY_Controller_old::$module) . " '" . $this->data['single_data'][MY_Controller_old::$identifier] . "'"; //name or title of current item
        }
        $active_session = get_active_session();
        $data = array(
            'status' => $this->config->item('status_closed'),
            'processed_by' => $active_session['username'],
            'processed_date' => inv_get_current_datetime_db(),
        );
        MY_Controller_old::$base_model->update($this->data['id'], $data, $title);

        return array(
            'message' => $title . $this->lang->line('notification_success_close'),
            'notification' => $this->config->item('success')
        );
    }

    /* --- CRUD management --- */

    /* --- api management --- */

    function build_detail_id($detail = array()) {
        $id = MY_Controller_old::$module_prefix;
        foreach ($this->get_detail_id_session() as $single) {
            $id = $id . substr($single, 0, 2);
            if (count($detail) > 0) {
                $id = $id . $detail[$single];
            } else {
                $id = $id . $this->input->post($single);
            }
        }
        if (MY_Controller_old::$allow_duplicate_items) {
            $id = $id . "tm" . inv_get_current_plain_view();
        }
        return $id;
    }

    function set_data_session() {
        if (MY_Controller_old::$use_api) {
            $module_session = get_session(MY_Controller_old::$session_name);
            if (!isset($module_session)) {
                $module_data = $this->data[MY_Controller_old::$module];
                foreach (MY_Controller_old::$session_fields as $key_field => $single_field) {
                    $module_session[$key_field] = $module_data[$single_field];
                }
                $module_details_session = array();
                $module_details = $this->data[MY_Controller_old::$module . "_" . $session_name];
                $count = 0;
                foreach ($module_details as $module_detail) {
                    $module_detail_session = array(
                        'id' => $count, //untuk check apabila ada, berarti tidak ada perubahan dari database, 'db_id' tidak akan diset apabila proses tambah baru
                    );
                    foreach (MY_Controller_old::$session_db_fields as $key_field => $single_field) {
                        $module_detail_session[$key_field] = $module_detail[$single_field];
                    }
                    $module_details_session[] = $module_detail_session;
                    $count++;
                }
                $module_session[MY_Controller_old::$module . "_" . $session_name] = $module_details_session;
                set_session(MY_Controller_old::$session_name, $module_session);
            }
        }
    }

    function get_data() {
        if (MY_Controller_old::$use_api) {
            print_r(json_encode(get_session(MY_Controller_old::$session_name)));
        }
    }

    function set_data() {
        if (MY_Controller_old::$use_api) {
            $module_session = get_session(MY_Controller_old::$session_name);
            foreach ($this->get_main_structure() as $single) {
                $module_session[$single['name']] = $this->input->post($single['name']);
                if ($single['type'] == $this->config->item('form_combobox')) {
                    $module_session[$single['name'] . "_name"] = $this->input->post($single['name'] . "_name");
                }
            }
            set_session(MY_Controller_old::$session_name, $module_session);
            print_r(json_encode($module_session));
        }
    }

    function get_detail_data($id) {
        if (MY_Controller_old::$use_api) {
            $detail_data = MY_Controller_old::$base_fifo_master_model->get_single_by_field($id);
            print_r(json_encode($detail_data));
        }
    }

    function populate_data($detail, $session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            /* set data from database */
            $module_session = get_session(MY_Controller_old::$session_name);
            foreach ($this->get_main_structure() as $single) {
                $module_session[$single['name']] = $detail[$single['name']];
                if ($single['type'] == $this->config->item('form_combobox')) {
                    $module_session[$single['name'] . "_name"] = $detail[$single['name'] . "_name"];
                }
            }
            set_session(MY_Controller_old::$session_name, $module_session);
        }
    }

    function populate_detail_data($details, $session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            /* set details from database */
            foreach ($details as $single) {
                $id = $this->build_detail_id($single);
                $module_session = get_session(MY_Controller_old::$session_name);
                if (isset($module_session[MY_Controller_old::$module . "_" . $session_name])) {
                    $module_details = $module_session[MY_Controller_old::$module . "_" . $session_name];
                } else {
                    $module_details = array();
                }
                $module_detail = array(
                    'id' => $id,
                );
                if (isset($single['id'])) {
                    $module_detail['db_id'] = $single['id'];
                }
                foreach ($this->get_detail_structure() as $single_field) {
                    if ($single_field['type'] == $this->config->item('form_label')) {
                        $module_detail[$single_field['name']] = $single[$single_field['name']];
                        $module_detail[$single_field['name'] . "_name"] = $single[$single_field['name'] . "_name"];
                    } else {
                        $module_detail[$single_field['name']] = $single[$single_field['name']];
                        if (isset($single_field['formula']) && $single_field['formula'] != "") {
                            $module_detail["total_" . $single_field['name']] = calculate_formula($single, $single_field['formula']);
                        }
                        if ($single_field['type'] == $this->config->item('form_combobox')) {
                            $module_detail[$single_field['name'] . "_name"] = $single[$single_field['name'] . "_name"];
                        }
                        if (isset($single_field['log_name']) && $single_field['log_name']) {
                            $module_detail["log_name"] = $single[$single_field['name'] . "_name"];
                        }
                    }
                }
                $module_detail['db_id'] = $single['id'];
                $module_details[] = $module_detail;
                $module_session[MY_Controller_old::$module . "_" . $session_name] = $module_details;
                set_session(MY_Controller_old::$session_name, $module_session);
            }
        }
    }

    function set_detail_data($session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            $mode = $this->input->post("mode");
            $is_quantity_insufficient = false;
            if (MY_Controller_old::$check_quantity_on_add_detail) {
                $detail_base_id = $this->input->post($this->get_detail_base_id());
                $database_data = MY_Controller_old::$base_fifo_master_model->get_single_by_field($detail_base_id);
                foreach ($this->get_detail_structure() as $single_field) {
                    if (isset($single_field['quantity_check']) && $single_field['quantity_check'] != "") {
                        $db_quantity = $database_data[$single_field['quantity_check']];
                        //$post_quantity = $this->input->post($single_field['name']);
                        $post_quantity = $this->get_detail_quantity_check();
                        if ($db_quantity < $post_quantity) {
                            $is_quantity_insufficient = true;
                        }
                    }
                }
            }
            if ($is_quantity_insufficient) {
                print_r(json_encode($this->lang->line('notification_error_not_enough_quantity'))); //$is_quantity_insufficient = true
            } else {
                $module_session = get_session(MY_Controller_old::$session_name);
                if (isset($module_session[MY_Controller_old::$module . "_" . $session_name])) {
                    $module_details = $module_session[MY_Controller_old::$module . "_" . $session_name];
                } else {
                    $module_details = array();
                }
                $id = $this->build_detail_id();
                $is_duplicate_item = false;
                if (!MY_Controller_old::$allow_duplicate_items) {
                    foreach ($module_details as $module_detail) {
                        if ($id == $module_detail['id']) {
                            $is_duplicate_item = true;
                            break;
                        }
                    }
                }
                if ($is_duplicate_item) {
                    print_r(json_encode($this->lang->line('notification_error_detail_added'))); //there can be no duplicate items
                } else {
                    $module_detail = array(
                        'id' => $id,
                    );
                    $post_data = $this->input->post();
                    foreach ($this->get_detail_structure() as $single_field) {
                        if ($single_field['type'] == $this->config->item('form_label')) {
                            $module_detail[$single_field['name']] = $this->input->post($single_field['name'] . "_id");
                            $module_detail[$single_field['name'] . "_name"] = $this->input->post($single_field['name']);
                        } else {
                            $module_detail[$single_field['name']] = $this->input->post($single_field['name']);
                            if (isset($single_field['formula']) && $single_field['formula'] != "") {
                                $module_detail["total_" . $single_field['name']] = calculate_formula($post_data, $single_field['formula']);
                            }
                            if ($single_field['type'] == $this->config->item('form_combobox')) {
                                $module_detail[$single_field['name'] . "_name"] = $this->input->post($single_field['name'] . "_name");
                            }
                            if (isset($single_field['log_name']) && $single_field['log_name']) {
                                $module_detail["log_name"] = $this->input->post($single_field['name'] . "_name");
                            }
                        }
                    }
                    $module_details[] = $module_detail;
                    $module_session[MY_Controller_old::$module . "_" . $session_name] = $module_details;
                    set_session(MY_Controller_old::$session_name, $module_session);
                    print_r(json_encode(""));
                }
            }
        }
    }

    function is_single_detail($session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            $is_found = 0;
            $id = "";
            $parameters = parameter_decoder(inv_url_reader(0));
            if (isset($parameters['id'])) {
                $id = $parameters['id'];
                $module_session = get_session(MY_Controller_old::$session_name);
                if (isset($module_session[MY_Controller_old::$module . "_" . $session_name])) {
                    $module_details = $module_session[MY_Controller_old::$module . "_" . $session_name];
                    foreach ($module_details as $module_detail) {
                        if ($module_detail['id'] == $id) {
                            $is_found = 1;
                            break;
                        }
                    }
                }
            }
            print_r(json_encode($is_found));
        }
    }

    function remove_single_detail($session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            $index = 0;
            $deleted_db_item = "";
            $id = $this->input->post('id');
            if ($id != "") {
                $module_session = get_session(MY_Controller_old::$session_name);
                if (isset($module_session[MY_Controller_old::$module . "_" . $session_name])) {
                    $module_details = $module_session[MY_Controller_old::$module . "_" . $session_name];
                    foreach ($module_details as $module_detail) {
                        if ($module_detail['id'] == $id) {
                            $deleted_db_item = $module_detail['db_id'];
                            break;
                        } else {
                            $index++;
                        }
                    }
                }
                if ($deleted_db_item != "") {
                    $deleted_db_items = $module_session['deleted_db_items'];
                    $deleted_db_items[] = $deleted_db_item;
                    $module_session['deleted_db_items'] = $deleted_db_items;
                }
                unset($module_details[$index]);
                $module_session[MY_Controller_old::$module . "_" . $session_name] = array_values($module_details); //re-index array
                set_session(MY_Controller_old::$session_name, $module_session);
            }
            print_r(json_encode($id));
        }
    }

    function remove_all_details($session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            $module_session = get_session(MY_Controller_old::$session_name);
            if (isset($module_session[MY_Controller_old::$module . "_" . $session_name])) {
                $deleted_db_items = array();
                foreach ($module_session[MY_Controller_old::$module . "_" . $session_name] as $module_detail) {
                    if (isset($module_detail['db_id'])) {
                        $deleted_db_items[] = $module_detail['db_id'];
                    }
                }
                $module_session['deleted_db_items'] = $deleted_db_items;
                $module_session[MY_Controller_old::$module . "_" . $session_name] = array();
                set_session(MY_Controller_old::$session_name, $module_session);
            }
        }
    }

    function clear_session($session_name = "detail") {
        if (MY_Controller_old::$use_api) {
            $this->session->unset_userdata(MY_Controller_old::$session_name);
            $this->session->unset_userdata(MY_Controller_old::$module . "_" . $session_name);
        }
    }

    function get_main_structure_json() {
        if (MY_Controller_old::$use_api) {
            $structure = array();
            foreach ($this->get_main_structure() as $single) {
                if ($single['type'] == $this->config->item('form_combobox')) {
                    $js_action = "select2:select";
                } else if ($single['type'] == $this->config->item('form_datefield')) {
                    $js_action = "change";
                } else {
                    $js_action = "input";
                }
                if (isset($single['required'])) {
                    $required = true;
                } else {
                    $required = false;
                }
                $structure[$single['name']] = array(
                    'label' => $this->lang->line('label_' . $single['name']),
                    'type' => $single['type'],
                    'js_action' => $js_action,
                    'required' => $required,
                );
            }
            print_r(json_encode($structure));
        }
    }

    function get_detail_structure_json() {
        if (MY_Controller_old::$use_api) {
            $structure = array();
            foreach ($this->get_detail_structure() as $single) {
                if ($single['type'] == $this->config->item('form_combobox')) {
                    $js_action = "select2:select";
                    $default = $single['selected'];
                } else if ($single['type'] == $this->config->item('form_datefield')) {
                    $js_action = "change";
                    $default = $single['default'];
                } else {
                    $js_action = "input";
                    $default = $single['default'];
                }
                if (isset($single['required_detail']) && $single['required_detail']) {
                    $required_detail = $single['required_detail'];
                } else {
                    $required_detail = false;
                }
                if (isset($single['positive_integer']) && $single['positive_integer']) {
                    $positive_integer = $single['positive_integer'];
                } else {
                    $positive_integer = false;
                }

                if (isset($single['formula']) && $single['formula']) {
                    $formula = $single['formula'];
                    $total_label = $this->lang->line('label_total_' . $single['name']);
                } else {
                    $formula = "";
                    $total_label = "";
                }
                if (isset($single['reset_on_input']) && $single['reset_on_input']) {
                    $reset_on_input = $single['reset_on_input'];
                } else {
                    $reset_on_input = false;
                }
                if (isset($single['detail_id']) && $single['detail_id']) {
                    $detail_id = $single['detail_id'];
                } else {
                    $detail_id = false;
                }
                if (isset($single['log_name']) && $single['log_name']) {
                    $log_name = $single['log_name'];
                } else {
                    $log_name = false;
                }
                if (isset($single['quantity_check']) && $single['quantity_check']) {
                    $quantity_check = $single['quantity_check'];
                } else {
                    $quantity_check = "";
                }
                if (isset($single['data_type']) && $single['data_type']) {
                    $data_type = $single['data_type'];
                } else {
                    $data_type = "";
                }
                $structure[$single['name']] = array(
                    'label' => $this->lang->line('label_' . $single['name']),
                    'total_label' => $total_label,
                    'type' => $single['type'],
                    'data_type' => $data_type,
                    'js_action' => $js_action,
                    'required_detail' => $required_detail,
                    'positive_integer' => $positive_integer,
                    'reset_on_input' => $reset_on_input,
                    'default' => $default,
                    'detail_id' => $detail_id,
                    'quantity_check' => $quantity_check,
                    'log_name' => $log_name,
                    'formula' => $formula,
                );
            }
            print_r(json_encode($structure));
        }
    }

    function get_single_data_by_id($model, $id) {
        return $model->get_single_by_field($id);
    }

    function get_detail_quantity_check() {
        return 0;
    }

    function get_adjust_quantity($single_data) {
        //name dari get_detail_structure yang akan digunakan untuk melakukan adjustment terhadap quantity produk
        return 0;
    }

    function get_detail_id_session() {
        return array();
    }

    /* --- api management --- */
}
