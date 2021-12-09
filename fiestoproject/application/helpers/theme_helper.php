<?php

/* ---
 * inv_app_search_loader($module_name, $form_search = '_content_default_search', $search_function = 'search_form') {}
 * this function generate default search preferences
 * --- */

function inv_app_search_loader($module_name, $form_search = '_content_default_search', $search_function = 'search_form') {
    $ci = & get_instance();
    $ci->data['form_search'] = $form_search; //can be overriden with Class::$module . '_search'
    $ci->data['search_action'] = base_url() . $module_name . "/$search_function/";
}

/* ---
 * inv_app_pagination_loader($module_name, $master, $total_rows, $offset, $parameter_buffer, $uri_segment = 4) {}
 * this function generate pagination for management
 * --- */

function inv_app_pagination_loader($module_name, $master, $total_rows, $offset, $parameter_buffer, $uri_segment = 4) {
    $ci = & get_instance();
    if (empty($master)) {
        if ($offset > 1) {
            $offset = $offset - 1;
            redirect($module_name . "/management/offset/$offset/$parameter_buffer");
        }
    }
    $ci->load->library('pagination');
    $pagination_config = array();
    $pagination_config['base_url'] = site_url($module_name . "/management/offset");
    $pagination_config['total_rows'] = $total_rows;
    $pagination_config['first_url'] = $pagination_config['base_url'] . "/1/$parameter_buffer";
    $pagination_config['prefix'] = "";
    $pagination_config['suffix'] = "/$parameter_buffer";
    $pagination_config['uri_segment'] = $uri_segment;
    $pagination_config['attributes'] = array('class' => 'page-link');
    $ci->pagination->initialize($pagination_config);
    $ci->data['pagination'] = $ci->pagination->create_links();
}

/* ---
 * inv_app_loader($loader_parameters) {}
 * this function generate app loader for database & view
 * --- */

function inv_app_loader($loader_parameters) {
    $ci = & get_instance();
    if (isset($loader_parameters['structure'])) {
        $structure = $loader_parameters['structure'];
        if (empty($structure)) {
            $structure = array(
                array(
                    'name' => 'empty_validation', //custom radio button = textfield
                    'type' => $ci->config->item('form_textfield'),
                ),
            );
        }
    } else {
        $structure = array();
    }
    if (isset($loader_parameters['columns'])) {
        $columns = $loader_parameters['columns'];
    } else {
        $columns = array();
    }
    if (isset($loader_parameters['master_data']['single_data'])) {
        $single_data = $loader_parameters['master_data']['single_data'];
    } else {
        $single_data = array();
    }
    if (isset($loader_parameters['master_data']['list_data'])) {
        $list_data = $loader_parameters['master_data']['list_data'];
    } else {
        $list_data = array();
    }
    if (isset($loader_parameters['master_data']['total_rows'])) {
        $total_rows = $loader_parameters['master_data']['total_rows'];
    } else {
        $total_rows = 0;
    }
    if (isset($loader_parameters['view_params'])) {
        $view_params = $loader_parameters['view_params'];
    } else {
        $view_params = array();
    }
    $view_params = $loader_parameters['view_params'];
    $view_params['columns'] = $columns;
    inv_app_validation_loader($view_params['mode'], $structure, $single_data);
    if ($view_params['mode'] == $ci->config->item('list')) {
        if (isset($view_params['use_form_search']) && $view_params['use_form_search']) {
            inv_app_search_loader($view_params['module'], $view_params['module'] . "_search"); //must be called before inv_app_pagination_loader() &  inv_app_view_loader()
        } else {
            inv_app_search_loader($view_params['module']); //must be called before inv_app_pagination_loader() &  inv_app_view_loader()
        }
    }
    if (isset($view_params['hide_form_search'])) {
        $ci->data['hide_form_search'] = $view_params['hide_form_search'];
    }
    if (isset($view_params['use_form_pagination']) && $view_params['use_form_pagination']) {
        inv_app_pagination_loader($view_params['module'], $list_data, $total_rows, $view_params['offset'], $view_params['search_parameters']); //must be called before inv_app_view_loader()
    }
    inv_app_view_loader($view_params);
}

function inv_app_loader_sample() {
    $loader_parameters = array(
        'structure' => $this->get_structure(), //call function to get form structure
        'master_data' => array(
            'list_data' => $this->data['users'], //list data for pagination
            'total_rows' => $this->data['total_rows'], //total rows for pagination
            'single_data' => $this->data['user'], //single master data for populate edit data
        ),
        'view_params' => array(
            'mode' => $mode, //general class setting for view's mode
            'parent_module' => User::$navigation_parent, //general class setting for parent module name
            'module' => User::$module, //general class setting for name
            'module_folder' => User::$folder, //general class setting for folder name
            'use_form_validation' => false, //true if form use validation, false if otherwise
            'use_form_search' => true, //true if form use search form, false if otherwise
            'hide_form_search' => true, //true
            'use_form_pagination' => true, //true if form use pagination, false if otherwise
            'title' => "", //type here to show on title label, if is not set, will go by default
            'sub_title' => "", //type here to show on sub title label, if is not set, will go by default
            'title_description' => "", //type here to show on title description label, if is not set, will go by default
            'modals' => array('_content_modal_delete.php'), //list every modal files used in current view
            'additional_js' => array('_content_js_custom.php'), //list every additional js files used in current view
            'form_add' => $this->config->item('add'), //set with function name for action add
            'form_submit' => true, //set to true, if forms need to use submit button
            'form_submit_label' => "", //type here to add custom submit label, if is not set, will go by default
            'form_action' => $action_url, //type here to add custom url for action in html form, if is not set, will go by default
            'form_back' => $back_url, //type here to add custom url for back button, if is not set, will go by default
            'form_delete' => $delete_url, //type here to add custom url for delete button, if is not set, will go by default
            'form_cancel' => $cancel_url, //type here to add custom url for cancel button, if is not set, will go by default
            'form_close' => $close_url, //type here to add custom url for close button, if is not set, will go by default
            'form_unclose' => $unclose_url, //type here to add custom url for unclose button, if is not set, will go by default
            'form_next' => $next_url, //type here to add custom url for next button, if is not set, will go by default
            'form_next_label' => $next_url, //type here to add custom url for next button, if is not set, will go by default
            'use_maxlength' => true, //set to true, if forms need to use this feature
            'use_datepicker' => true, //set to true, if forms need to use this feature
            'use_monthpicker' => true, //set to true, if forms need to use this feature
            'use_select2' => true, //set to true, if forms need to use this feature
            'use_masked_time' => true,  //set to true, if forms need to use this feature
            'use_summernote' => true, //set to true, if forms need to use this feature
            'use_image' => true, //set to true, if forms contains image(s)
            'use_cropper' => true, //set to true, if forms need to use this feature
            'hide_form_navigation' => true, //set to true, if forms navigation needs to be hidden
            'offset_parameters' => $this->data['offset_parameter_buffer'], //get ONLY offset parameter
            'search_parameters' => $this->data['search_parameter_buffer'], //get for search parameters
            'advance_parameters' => $this->data['advance_parameter_buffer'], //get parameters BESIDE offset and search
            'view' => $view, //type here select view with custom name, if is not set, will go by default, VIEW will be loaded in CONTAINER
            'container' => $container, //type here select container with custom name, if is not set, will go by default
        ),
    );
    return $loader_parameters;
}

/* ---
 * inv_app_validation_loader($form_type, $structure = null, $single_master_data = null) {}
 * this function generate validations for codeigniter & javascript
 * --- */

function inv_app_validation_loader($mode, $structure = null, $single_master_data = null) {
    $ci = & get_instance();
    foreach ($structure as $single) {
        $key = $single['name'];
        $type = $single['type'];
        if (isset($single['default'])) {
            $default = $single['default'];
        } else {
            $default = "";
        }
        /* --- form_image will be handled differently --- */
        if ($type == $ci->config->item('form_textfield') ||
                $type == $ci->config->item('form_textarea') ||
                $type == $ci->config->item('form_datefield') ||
                $type == $ci->config->item('form_file')) {
            if ($mode == $ci->config->item('edit')) {
                if (isset($default) && $default != "") {
                    $ci->data[$key] = $default;
                } else {
                    if (isset($single_master_data[$key])) {
                        $ci->data[$key] = $ci->form_validation->set_value($key, $single_master_data[$key]);
                    } else {
                        $ci->data[$key] = $ci->form_validation->set_value($key, "");
                    }
                }
            } else {
                if (isset($default)) {
                    $ci->data[$key] = $default;
                } else {
                    $ci->data[$key] = $ci->form_validation->set_value($key);
                }
            }
        } else if ($type == $ci->config->item('form_combobox') ||
                $type == $ci->config->item('form_combobox_multiple')) {
            $combobox_option = array();
            $first_option = $single['first_option'];
            if (isset($single['first_option_id'])) {
                $first_option_id = $single['first_option_id'];
            } else {
                $first_option_id = "0";
            }
            $id = $single['id'];
            $values = $single['values'];
            $delimiter = $single['delimiter'];
            $selected = $single['selected'];
            $master_data = $single['master'];

            if ($first_option != "") {
                $combobox_option[$first_option_id] = $first_option;
            }
            if (count($master_data) > 0) {
                foreach ($master_data as $single_master) {
                    if ($id != "" && $values != "") {
                        $delimiter_values = explode("|", $values);
                        $combobox_value = "";
                        if ($delimiter == "") {
                            $delimiter_open = " (";
                            $delimiter_close = ")";
                        } else {
                            $delimiter_open = $delimiter;
                            $delimiter_close = "";
                        }
                        foreach ($delimiter_values as $value) {
                            if (preg_match('/[\$]/', $value)) {
                                $single_value = $ci->config->item('currency') . inv_format_decimal($single_master[str_replace("$", "", $value)]);
                            } else {
                                $single_value = $single_master[str_replace("$", "", $value)];
                            }
                            if ($combobox_value == "") {
                                $combobox_value = $combobox_value . $single_value;
                            } else {
                                if ($single_value != "") {
                                    $combobox_value = $combobox_value . $delimiter_open . $single_value . $delimiter_close;
                                }
                            }
                        }
                        $combobox_option[$single_master[$id]] = $combobox_value;
                    }
                }
            }
            $ci->data[$key . '_option'] = $combobox_option;
            if ($mode == $ci->config->item('edit')) {
                if ($selected == "[none]") {
                    $ci->data[$key . '_option_selected'] = "";
                } else if ($selected == "") {
                    if (isset($single_master_data[$key])) {
                        $ci->data[$key . '_option_selected'] = $single_master_data[$key];
                    } else {
                        $ci->data[$key . '_option_selected'] = "";
                    }
                } else {
                    $ci->data[$key . '_option_selected'] = $selected;
                }
            } else {
                $ci->data[$key . '_option_selected'] = $selected;
            }
        } else if ($type == $ci->config->item('form_radio')) {
            $selected = $single['selected'];
            $default = $single['default'];
            if ($selected == "") {
                if ($single_master_data == null) {
                    $ci->data[$key] = $default;
                } else {
                    $ci->data[$key] = $single_master_data[$key];
                }
            } else {
                $ci->data[$key] = $selected;
            }
        } else if ($type == $ci->config->item('form_checkbox')) {
            //TODO
        } else if ($type == $ci->config->item('form_image')) {
//            print_r($single_master_data);
//            print_r("<br/>");
//            die("$type // $key");
//            if (isset($single_master_data[$key])) {
//                $ci->data[$key] = $single_master_data[$key];
//            } else {
//
//            }
            $ci->data[$key] = $key;
        }
    }
}

/* ---
 * inv_app_view_loader($view_params = null) {}
 * this function generate validations for codeigniter & javascript
 * --- */

function inv_app_view_loader($view_params = null) {
    $ci = & get_instance();
    $ci->data['shown_module'] = $ci->lang->line('navigation_' . $view_params['module']);
    $ci->data['module'] = $view_params['module'];
    $ci->data['mode'] = $view_params['mode'];
    if (!isset($view_params['offset_parameters'])) {
        $view_params['offset_parameters'] = "";
    } else {
        if ($view_params['offset_parameters'] != "") {
            $view_params['offset_parameters'] .= "/";
        }
    }
    if (!isset($view_params['advance_parameters'])) {
        $view_params['advance_parameters'] = "";
    } else {
        if ($view_params['advance_parameters'] != "") {
            $view_params['advance_parameters'] .= "/";
        }
    }
    if (isset($view_params['use_form_validation']) && $view_params['use_form_validation']) {
        $ci->data['message'] = (validation_errors() ? validation_errors() : $ci->session->flashdata('message')); //set the flash data error message if there is one
        if ($ci->session->flashdata('notification') == "") {
            $ci->data['notification'] = (validation_errors() || $ci->session->flashdata('message') ? $ci->config->item('error') : $ci->config->item('success'));
        } else {
            $ci->data['notification'] = $ci->session->flashdata('notification');
        }
    } else {
        $ci->data['message'] = $ci->session->flashdata('message');
        $ci->data['notification'] = $ci->session->flashdata('notification');
    }
    if (isset($view_params['columns'])) {
      $ci->data['columns'] = $view_params['columns'];
    }
    $ci->data['title'] = "";
    if (isset($view_params['title']) && $view_params['title'] != $ci->config->item('blank')) {
        $ci->data['title'] = $view_params['title'];
    } else if (isset($view_params['module'])) {
        if (isset($view_params['title']) && $view_params['title'] != $ci->config->item('blank')) {
            $ci->data['title'] = $view_params['title'];
        } else {
            $ci->data['title'] = $ci->lang->line('navigation_' . $view_params['module']);
        }
    }
    if (isset($view_params['sub_title']) && $view_params['sub_title'] != $ci->config->item('blank')) {
        $ci->data['sub_title'] = $view_params['sub_title'];
    } else {
        if (isset($view_params['sub_title']) && $view_params['sub_title'] != $ci->config->item('blank')) {
            $ci->data['sub_title'] = $view_params['sub_title'];
        } else {
            $ci->data['sub_title'] = $ci->lang->line('navigation_' . $view_params['module'] . "_" . $view_params['mode']);
        }
    }
    if (isset($view_params['title_description']) && $view_params['title_description'] != $ci->config->item('blank')) {
        $ci->data['title_description'] = $view_params['title_description'];
    } else {
        $ci->data['title_description'] = "";
    }
    if (isset($view_params['parent_title']) && $view_params['parent_title'] != $ci->config->item('blank')) {
        $ci->data['parent_title'] = $view_params['parent_title'];
    } else if (isset($view_params['parent_module'])) {
        $ci->data['parent_title'] = $ci->lang->line('navigation_' . $view_params['parent_module']);
    }
    if (isset($view_params['form_add'])) {
        $ci->data['form_add'] = base_url() . $view_params['module'] . "/" . $view_params['form_add'] . "/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_invite'])) {
        $ci->data['form_invite'] = base_url() . $view_params['module'] . "/" . $view_params['form_invite'] . "/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_action']) && $view_params['form_action'] != "") {
        $ci->data['form_action'] = $view_params['form_action'];
    } else if (!isset($view_params['form_action'])) {
        $ci->data['form_action'] = base_url() . $view_params['module'] . "/" . $view_params['mode'] . "/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_action_label'])) {
        $ci->data['form_action_label'] = $view_params['form_action_label'];
    }
    if (isset($view_params['form_delete']) && $view_params['form_delete'] != "") {
        $ci->data['form_delete'] = $view_params['form_delete'];
    } else {
        $ci->data['form_delete'] = base_url() . $view_params['module'] . "/delete/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_cancel']) && $view_params['form_cancel'] != "") {
        $ci->data['form_cancel'] = $view_params['form_cancel'];
    } else {
        $ci->data['form_cancel'] = base_url() . $view_params['module'] . "/cancel/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_close']) && $view_params['form_close'] != "") {
        $ci->data['form_close'] = $view_params['form_close'];
    } else {
        $ci->data['form_close'] = base_url() . $view_params['module'] . "/close/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_unclose']) && $view_params['form_unclose'] != "") {
        $ci->data['form_unclose'] = $view_params['form_unclose'];
    } else {
        $ci->data['form_unclose'] = base_url() . $view_params['module'] . "/unclose/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'];
    }
    if (isset($view_params['form_back'])) {
        if ($view_params['form_back'] == $ci->config->item('blank')) {
            $ci->data['form_back'] = "";
        } else {
            $ci->data['form_back'] = $view_params['form_back'];
        }
    } else {
        if ($view_params['mode'] != $ci->config->item('list')) {
            if (isset($view_params['javascript_return_id'])) {
                $javascript_id = "#" . $view_params['javascript_return_id'];
            } else {
                $javascript_id = "";
            }
            $ci->data['form_back'] = base_url() . $view_params['module'] . "/management/" . $view_params['offset_parameters'] . $view_params['advance_parameters'] . $view_params['search_parameters'] . $javascript_id;
        }
    }
    if (isset($view_params['form_submit'])) {
        $ci->data['form_submit'] = $view_params['form_submit'];
    }
    if (isset($view_params['form_submit_label'])) {
        $ci->data['form_submit_label'] = $view_params['form_submit_label'];
    } else {
        $ci->data['form_submit_label'] = $ci->lang->line('action_' . $view_params['mode']);
    }
    if (isset($view_params['form_next'])) {
        $ci->data['form_next'] = $view_params['form_next'];
    }
    if (isset($view_params['form_next_label'])) {
        $ci->data['form_next_label'] = $view_params['form_next_label'];
    }
    if (isset($view_params['additional_js'])) {
        $ci->data['additional_js'] = $view_params['additional_js'];
    }
    if (isset($view_params['modals'])) {
        $ci->data['modals'] = $view_params['modals'];
    }
    if (isset($view_params['use_maxlength']) && $view_params['use_maxlength']) {
        $ci->data['use_maxlength'] = $view_params['use_maxlength'];
    } else {
        $ci->data['use_maxlength'] = false;
    }
    if (isset($view_params['use_datepicker']) && $view_params['use_datepicker']) {
        $ci->data['use_datepicker'] = $view_params['use_datepicker'];
    } else {
        $ci->data['use_datepicker'] = false;
    }
    if (isset($view_params['use_monthpicker']) && $view_params['use_monthpicker']) {
        $ci->data['use_monthpicker'] = $view_params['use_monthpicker'];
    } else {
        $ci->data['use_monthpicker'] = false;
    }
    if (isset($view_params['use_select2']) && $view_params['use_select2']) {
        $ci->data['use_select2'] = $view_params['use_select2'];
    } else {
        $ci->data['use_select2'] = false;
    }
    if (isset($view_params['use_masked_time']) && $view_params['use_masked_time']) {
        $ci->data['use_masked_time'] = $view_params['use_masked_time'];
    } else {
        $ci->data['use_masked_time'] = false;
    }
    if (isset($view_params['use_summernote']) && $view_params['use_summernote']) {
        $ci->data['use_summernote'] = $view_params['use_summernote'];
    } else {
        $ci->data['use_summernote'] = false;
    }
    if (isset($view_params['use_image']) && $view_params['use_image']) {
        $ci->data['use_image'] = $view_params['use_image'];
    } else {
        $ci->data['use_image'] = false;
    }
    if (isset($view_params['use_cropper']) && $view_params['use_cropper']) {
        $ci->data['use_cropper'] = $view_params['use_cropper'];
    } else {
        $ci->data['use_cropper'] = false;
    }
    if (isset($view_params['use_custom_js_module']) && $view_params['use_custom_js_module'] != '') {
        $ci->data['use_custom_js_module'] = $view_params['use_custom_js_module'];
    } else {
        $ci->data['use_custom_js_module'] = false;
    }
    if (isset($view_params['use_custom_filter']) && $view_params['use_custom_filter']) {
        $ci->data['use_custom_filter'] = $view_params['use_custom_filter'];
    } else {
        $ci->data['use_custom_filter'] = false;
    }
    if (isset($view_params['use_custom_sort']) && $view_params['use_custom_sort']) {
        $ci->data['use_custom_sort'] = $view_params['use_custom_sort'];
    } else {
        $ci->data['use_custom_sort'] = false;
    }
    if (isset($view_params['hide_form_navigation']) && $view_params['hide_form_navigation']) {
        $ci->data['hide_form_navigation'] = $view_params['hide_form_navigation'];
    } else {
        $ci->data['hide_form_navigation'] = false;
    }
    if (isset($view_params['view'])) {
        $ci->data['view'] = $view_params['view'];
    } else {
        if ($view_params['mode'] == $ci->config->item('add') || $view_params['mode'] == $ci->config->item('edit')) {
            $ci->data['view'] = $view_params['module'] . "_" . $ci->config->item('add') . "_" . $ci->config->item('edit');
        } else {
            $ci->data['view'] = $view_params['module'] . "_" . $view_params['mode'];
        }
    }
    if (isset($view_params['container'])) {
        $ci->load->view($view_params['container'], $ci->data);
    } else {
        if ($view_params['mode'] == $ci->config->item('list')) {
            $container_type = "_container_list.php";
        } else if ($view_params['mode'] == $ci->config->item('view')) {
            $container_type = "_container_view.php";
        } else {
            $container_type = "_container_form.php";
        }
        $ci->load->view($view_params['module_folder'] . $container_type, $ci->data);
    }
}

/* ---
 * inv_app_show_notification($module) {}
 * this function is called to show message notification in form
 * --- */

function inv_app_show_notification($module) {
    $ci = & get_instance();
    $ci->data['module'] = $module;
    $ci->data['message'] = $ci->session->flashdata('message');
    $ci->data['notification'] = $ci->session->flashdata('notification');
}

/* ---
 * inv_get_no_validation_structure() {}
 * this function is called to get default structure when no validation is needed
 * --- */

function inv_get_no_validation_structure() {
    $ci = & get_instance();
    return array(
        array(
            'name' => 'empty_validation',
            'type' => $ci->config->item('form_textfield'),
        ),
    );
}
