<?php
function aindo_basic_label($label_name = "", $required_symbol = "") {
    /*
     * function aindo_basic_label($label_name = "", $required_symbol = "");
     * 
     * fungsi ini digunakan untuk menampilkan label
     * 
     * label_name : name of label
     * required_symbol : required symbol for label
     */
    if ($label_name == "") {
        return "";
    } else {
        return "<label class = 'text-primary'>$label_name $required_symbol</label>";
    }
}

function aindo_basic_form_group($input_html, $label_html = "") {
    /*
     * function aindo_basic_form_group($input_html, $label_html = "");
     * 
     * fungsi ini digunakan untuk membuat form group (input & label)
     * 
     * input_html : html form <input />
     * label_html : html label for input
     */
    return "<div class='form-group'>
                    $label_html
                    $input_html
            </div>";
}

function aindo_basic_form_group_inline($input_html, $label_html = "") {
    /*
     * function aindo_basic_form_group_inline($input_html, $label_html = "");
     * 
     * fungsi ini digunakan untuk membuat form group versi inline (input & label)
     * 
     * input_html : html form <input />
     * label_html : html label for input
     */
    return "<div class='form-group'>
                <div class='row align-items-center'>
                        <div class='col-sm-6'>
                                $label_html
                        </div>
                        <div class='col-sm-6'>
                                $input_html
                        </div>
                </div>
            </div>";
}

function aindo_get_image_url($path, $name, $search = '', $replace = '') {
    /*
     * function aindo_get_image_url($path, $name, $search = '', $replace = '');
     * 
     * fungsi ini digunakan untuk membentuk path image secara lengkap
     * 
     * path : image path (not realpath)
     * name : image name
     * search : str_replace parameter for name changing
     * replace : str_replace parameter for name changing
     */
    if ($search != '' && $replace != '') {
        $name = str_replace($search, $replace, $name);
    }
    $image_path = $path . '/' . $name;
    $image_realpath = realpath($image_path);
    if (!is_file($image_realpath)) {
        $default_image = base_url() . 'images/noimage_small.png';
    } else {
        $default_image = base_url() . $image_path;
    }
    return $default_image;
}

function aindo_basic_rounded_button() {
    return "<a href='#' class='btn btn-primary rounded-button' type='submit'>+</a>";
}

function aindo_basic_checkbox($parameters) {
    /*
     * function aindo_basic_checkbox($parameters);
     * 
     * fungsi ini digunakan untuk membuat input bentuk checkbox
     * 
     * input_id : id attribute for input
     * input_name : name attribute for input
     * input_value : value attribute for input
     * input_class : class attribute for input
     * input_is_checked : TRUE if input is checked
     * input_is_disabled : TRUE if input is disabled
     * label : label for input
     */

    $checkbox_parameters = array(
        'input_id' => '',
        'input_name' => '',
        'input_value' => '',
        'input_class' => '',
        'input_is_checked' => '',
        'input_is_disabled' => '',
        'label' => ''
    );
    if (isset($parameters['input_id'])) {
        $input_id = $parameters['input_id'];

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = $parameters['input_class'];
        } else {
            $input_class = "";
        }
        if (isset($parameters['input_is_checked'])) {
            $input_is_checked = $parameters['input_is_checked'];
        } else {
            $input_is_checked = TRUE;
        }
        if (isset($parameters['input_is_disabled'])) {
            $input_is_disabled = $parameters['input_is_disabled'];
        } else {
            $input_is_disabled = TRUE;
        }
        if (isset($parameters['label'])) {
            $label = $parameters['label'];
        } else {
            $label = "";
        }
        if ($input_is_checked) {
            if ($input_is_disabled) {
                $checked = "checked disabled";
            } else {
                $checked = "checked";
            }
        } else {
            $checked = "";
        }
        return "<label class='custom-check'>
                    <input type='checkbox' id='$input_id' name='$input_name' value='$input_value' class='$input_class' $checked>
                    <span class='checkmark'></span>
                    <div>$label</div>
                </label>";
    } else {
        print_r("aindo_basic_checkbox INPUT_ID mandatory!");
        return "";
    }
    /*
     * inv_view_basic_custom_checkbox();
     * OLD: $id, $name, $value, $label, $is_checked, $class_name, $is_disabled = true
     */
}

function aindo_basic_radio($parameters) {
    /*
     * function aindo_basic_radio($parameters);
     * 
     * fungsi ini digunakan untuk membuat input bentuk radio button
     * 
     * input_id : id attribute for input
     * input_name : name attribute for input
     * input_value : value attribute for input
     * input_class : class attribute for input
     * input_is_checked : TRUE if input is checked
     * label : label for input
     */

    $radio_parameters = array(
        'input_id' => '',
        'input_name' => '',
        'input_value' => '',
        'input_class' => '',
        'input_is_checked' => '',
        'label' => ''
    );

    if (isset($parameters['input_id'])) {
        $input_id = $parameters['input_id'];

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = $parameters['input_class'];
        } else {
            $input_class = "";
        }
        if (isset($parameters['input_is_checked'])) {
            $input_is_checked = $parameters['input_is_checked'];
        } else {
            $input_is_checked = TRUE;
        }
        if (isset($parameters['input_is_disabled'])) {
            $input_is_disabled = $parameters['input_is_disabled'];
        } else {
            $input_is_disabled = TRUE;
        }
        if (isset($parameters['label'])) {
            $label = $parameters['label'];
        } else {
            $label = "";
        }

        if ($input_is_checked) {
            $checked = "checked disabled";
        } else {
            $checked = "";
        }
        return "
	<label class='custom-check'>$label
            <input type='radio' id='$input_id' name='$input_name' value='$input_value' class='$input_class' $checked>
	  <span class='checkmark'></span>
	</label>
	";
    } else {
        print_r("aindo_basic_radio INPUT_ID mandatory!");
        return "";
    }
    /*
     * inv_view_basic_custom_radio();
     * OLD: $id, $name, $value, $label, $is_checked, $class_name
     */
}

function aindo_basic_superedit_textfield($parameters) {
    /*
     * function aindo_basic_superedit_textfield($parameters);
     * 
     * fungsi ini digunakan untuk membuat input bentuk textfield dengan fitur superedit (hanya role tertentu yang bisa edit)
     * 
     * is_inline : TRUE if use form inline
     * input_id : id attribute for input
     * input_name : name attribute for input
     * input_value : value attribute for input
     * input_class : class attribute for input
     * forbidden_superedit : forbidden_superedit setting from controller
     * mode : TRUE if input is checked
     * requirement : requirement for label
     */

    $textfield_parameters = array(
        'input_id' => '',
        'input_name' => '',
        'input_value' => '',
        'input_class' => '',
        'forbidden_superedit' => '',
        'mode' => '',
        'requirement' => '',
        'is_inline' => ''
    );

    if (isset($parameters['input_id']) && isset($parameters['forbidden_superedit']) && isset($parameters['mode'])) {
        $input_id = $parameters['input_id'];
        $forbidden_superedit = $parameters['forbidden_superedit'];
        $mode = $parameters['mode'];

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = "js-maxlength form-control " . $parameters['input_class'];
        } else {
            $input_class = "js-maxlength form-control";
        }
        if (isset($parameters['requirement'])) {
            $requirement = $parameters['requirement'];
        } else {
            $requirement = array();
        }
        if (isset($parameters['is_inline'])) {
            $is_inline = $parameters['is_inline'];
        } else {
            $is_inline = FALSE;
        }

        $ci = & get_instance();
        $label_name = $ci->lang->line('label_' . $input_name);
        $label = aindo_basic_label($label_name, $requirement['requirement_text']);

        if ($mode == $ci->config->item('edit') && $forbidden_superedit) {
            $input = "<label class='font-s14 line-height41'>$input_value</label>
                    <input type='hidden' id='$input_id' name='$input_name' value='$input_value' />";
        } else {
            $max_length = $requirement['max_length'];
            $input = "<input class='js-maxlength form-control' 
                       type='text' 
                       maxlength='$max_length' 
                       id='$input_id' name='$input_name' 
                       placeholder='$label_name'
                       value='$input_value'>";
        }
        if ($is_inline) {
            return aindo_basic_form_group_inline($input, $label);
        } else {
            return aindo_basic_form_group($input, $label);
        }
    } else {
        print_r("aindo_basic_superedit_textfield INPUT_ID & FORBIDDEN_SUPEREDIT & MODE mandatory!");
        return "";
    }
    /*
     * inv_view_generate_superedit_textfield
     * OLD: $name, $requirement, $forbidden_superedit, $mode, $value
     */
}

function aindo_basic_textfield($parameters) {
    /*
     * function aindo_basic_textfield($parameters);
     *  
     * fungsi ini digunakan untuk membuat input bentuk textfield
     * 
     * input_id : id attribute for input
     * input_name : name attribute for input
     * input_value : value attribute for input
     * input_class : class attribute for input
     * input_type : type attribute for input (TEXT, NUMBER, etc)
     * attribute : custom attribute for input
     * requirement : requirement for label
     * is_inline : TRUE if use form inline
     */

    $textfield_parameters = array(
        'input_id' => '',
        'input_name' => '',
        'input_value' => '',
        'input_class' => '',
        'input_type' => '',
        'attribute' => '',
        'requirement' => '',
        'is_inline' => '',
    );

    if (isset($parameters['input_id'])) {
        $input_id = $parameters['input_id'];

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = "js-maxlength form-control " . $parameters['input_class'];
        } else {
            $input_class = "js-maxlength form-control";
        }
        if (isset($parameters['input_type'])) {
            $input_type = $parameters['input_type'];
        } else {
            $input_type = "text";
        }
        if (isset($parameters['requirement'])) {
            $requirement = $parameters['requirement'];
        } else {
            $requirement = array();
        }
        if (isset($parameters['attribute'])) {
            $attribute = $parameters['attribute'];
        } else {
            $attribute = "";
        }
        if (isset($parameters['is_inline'])) {
            $is_inline = $parameters['is_inline'];
        } else {
            $is_inline = FALSE;
        }
        if (strpos($input_class, 'datepicker') !== false) {
            $is_date = true;
            $disable_autocomplete = "autocomplete='off'";
        } else {
            $is_date = false;
            $disable_autocomplete = "";
        }

        $ci = & get_instance();
        $label_name = $ci->lang->line('label_' . $input_name);
        $max_length = $requirement['max_length'];
        $input = "<input class='$input_class' 
                   type='$input_type' 
                   maxlength='$max_length' 
                   id='$input_id' name='$input_name' 
                   placeholder='$label_name'
                   value='$input_value'
                   $attribute
                   $disable_autocomplete
                   >";
        $label = aindo_basic_label($label_name, $requirement['requirement_text']);
        if ($is_inline) {
            return aindo_basic_form_group_inline($input, $label);
        } else {
            return aindo_basic_form_group($input, $label);
        }
    } else {
        print_r("aindo_basic_textfield INPUT_ID mandatory!");
        return "";
    }

    /*
     * inv_view_generate_textfield
     * OLD: $name, $requirement, $value, $custom_class = ""
     */
}

function aindo_basic_textarea($parameters) {
    /*
     * function aindo_basic_textarea($parameters);
     * 
     * fungsi ini digunakan untuk membuat input bentuk textarea
     * 
     * input_id : id attribute for input
     * input_name : name attribute for input
     * input_value : value attribute for input
     * input_class : class attribute for input
     * rows : number of rows of textarea
     * requirement : requirement for label
     * is_inline : TRUE if use form inline
     */
    $textarea_parameters = array(
        'input_id' => '',
        'input_name' => '',
        'input_value' => '',
        'input_class' => '',
        'rows' => '',
        'requirement' => '',
        'is_inline' => ''
    );

    if (isset($parameters['input_id'])) {
        $input_id = $parameters['input_id'];

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = "js-maxlength form-control js-summernote " . $parameters['input_class'];
        } else {
            $input_class = "js-maxlength form-control js-summernote";
        }
        if (isset($parameters['input_type'])) {
            $input_type = $parameters['input_type'];
        } else {
            $input_type = "text";
        }
        if (isset($parameters['rows'])) {
            $rows = $parameters['rows'];
        } else {
            $rows = "3";
        }
        if (isset($parameters['requirement'])) {
            $requirement = $parameters['requirement'];
        } else {
            $requirement = array();
        }
        if (isset($parameters['is_inline'])) {
            $is_inline = $parameters['is_inline'];
        } else {
            $is_inline = FALSE;
        }

        $ci = & get_instance();
        $label_name = $ci->lang->line('label_' . $input_name);
        $max_length = $requirement['max_length'];

        $input = "<textarea 
                  class='$input_class' 
                  maxlength='$max_length' 
                  id='$input_id' name='$input_name' rows='$rows' 
                  placeholder='$label_name'>$input_value</textarea>";
        $label = aindo_basic_label($label_name, $requirement['requirement_text']);
        if ($is_inline) {
            return aindo_basic_form_group_inline($input, $label);
        } else {
            return aindo_basic_form_group($input, $label);
        }
    } else {
        print_r("aindo_basic_textarea INPUT_ID mandatory!");
        return "";
    }

    /*
     * inv_view_generate_textarea
     * OLD: $name, $requirement, $value, $rows = '3'
     */
}

function aindo_basic_combobox($parameters) {
    /*
     * function aindo_basic_combobox($parameters);
     * 
     * fungsi ini digunakan untuk membuat input bentuk combobox
     * 
     * input_id : id attribute for combobox
     * input_name : name attribute for combobox
     * input_value_option : value option for combobox
     * input_value_option_selected : selected value option for combobox
     * input_class : class attribute for input
     * input_style : custom style attribute for combobox
     * requirement : requirement for label
     * is_inline : TRUE if use form inline
     */

    $combobox_parameters = array(
        'input_id' => '',
        'input_name' => '',
        'input_value_option' => '',
        'input_value_option_selected' => '',
        'input_class' => '',
        'input_style' => '',
        'requirement' => '',
        'is_inline' => ''
    );

    if (isset($parameters['input_id']) && isset($parameters['input_value_option'])) {
        $input_id = $parameters['input_id'];
        $input_value_option = $parameters['input_value_option'];
        if (isset($parameters['input_value_option_selected'])) {
            $input_value_option_selected = $parameters['input_value_option_selected'];
        } else {
            $input_value_option_selected = "";
        }

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = "js-select2 form-control " . $parameters['input_class'];
        } else {
            $input_class = "js-select2 form-control";
        }
        if (isset($parameters['input_style'])) {
            $input_style = "width:100%;" . $parameters['input_class'];
        } else {
            $input_style = "width:100%;";
        }
        if (isset($parameters['input_type'])) {
            $input_type = $parameters['input_type'];
        } else {
            $input_type = "text";
        }
        if (isset($parameters['requirement'])) {
            $requirement = $parameters['requirement'];
        } else {
            $requirement = array();
        }
        if (isset($parameters['is_inline'])) {
            $is_inline = $parameters['is_inline'];
        } else {
            $is_inline = FALSE;
        }

        $ci = & get_instance();
        $label_name = $ci->lang->line('label_' . $input_name);

        $input = form_dropdown($input_name, $input_value_option, $input_value_option_selected, "id='$input_id' class='$input_class' style='$input_style'");

        $label = aindo_basic_label($label_name, $requirement['requirement_text']);
        if ($is_inline) {
            return aindo_basic_form_group_inline($input, $label);
        } else {
            return aindo_basic_form_group($input, $label);
        }
    } else {
        print_r("aindo_basic_combobox INPUT_ID mandatory!");
        return "";
    }

    /*
     * inv_view_generate_textarea
     * OLD: $name, $requirement, $value, $rows = '3'
     */
}

function aindo_basic_image($parameters) {
    /*
     * function aindo_basic_image($parameters); 
     * 
     * fungsi ini digunakan untuk membuat input bentuk gambar
     * 
     * parameters:
     * input_id : id attribute for combobox
     * input_module : module used for image
     * input_name : name attribute for combobox
     * input_value : value option for combobox
     * input_class : class attribute for input
     * image_path : correct path for showing image
     * label_name : label for image input
     * image_data : data used for image recognition
     * image_filename : image filename
     * use_block : TRUE if use block div
     * use_delete : TRUE if use delete div
     * hide_upload_icon : TRUE if hide upload icon
     * requirement : requirement for label
     * is_inline : TRUE if use form inline
     */

    $combobox_parameters = array(
        'input_id' => '',
        'input_module' => '',
        'input_name' => '',
        'input_value' => '',
        'input_class' => '',
        'image_path' => '',
        'label_name' => '',
        'image_data' => '',
        'image_filename' => '',
        'use_block' => '',
        'use_delete' => '',
        'hide_upload_icon' => '',
        'requirement' => '',
        'is_inline' => ''
    );

    $ci = & get_instance();
    if (isset($parameters['input_id']) && isset($parameters['input_module'])) {
        $input_id = $parameters['input_id'];
        $input_module = $parameters['input_module'];

        if (isset($parameters['input_name'])) {
            $input_name = $parameters['input_name'];
        } else {
            $input_name = $input_id;
        }
        if (isset($parameters['input_value'])) {
            $input_value = $parameters['input_value'];
        } else {
            $input_value = "";
        }
        if (isset($parameters['input_class'])) {
            $input_class = "fform-control-file file-upload " . $parameters['input_class'];
        } else {
            $input_class = "fform-control-file file-upload";
        }
        if (isset($parameters['image_path'])) {
            $image_path = $parameters['image_path'];
        } else {
            $image_path = $ci->config->item('default_' . $input_module . '_image_url') . $input_value;
        }
        if (isset($parameters['label_name'])) {
            $label_name = $parameters['label_name'];
        } else {
            $label_name = $ci->lang->line('label_' . $input_name);
        }
        if (isset($parameters['image_data'])) {
            $image_data = $parameters['image_data'];
        } else {
            $image_data = "";
        }
        if (isset($parameters['image_filename'])) {
            $image_filename = $parameters['image_filename'];
        } else {
            $image_filename = "";
        }
        if (isset($parameters['use_block'])) {
            $use_block = $parameters['use_block'];
        } else {
            $use_block = FALSE;
        }
        if (isset($parameters['use_delete'])) {
            $use_delete = $parameters['use_delete'];
        } else {
            $use_delete = FALSE;
        }
        if (isset($parameters['hide_upload_icon'])) {
            if ($parameters['hide_upload_icon']) {
                $upload_icon_style = "style='display: none;'";
            } else {
                $upload_icon_style = "";
            }
        } else {
            $upload_icon_style = "";
        }
        if (isset($parameters['requirement'])) {
            $requirement = $parameters['requirement'];
        } else {
            $requirement = array();
        }
        if (isset($parameters['is_inline'])) {
            $is_inline = $parameters['is_inline'];
        } else {
            $is_inline = FALSE;
        }

        $icon_upload = base_url() . 'images/icons_upload.svg';
        $image_realpath = realpath($image_path);
        $default_image = base_url() . $image_path;
        if (!is_file($image_realpath)) {
            $default_image = base_url() . 'images/blank.png';
        }
        if (strpos($image_filename, 'pdf') !== false) {
            $default_image = base_url() . 'images/pdf.png';
        }
        $block_start = $use_block == true ?
                "<div id='block_image_$input_name' class='block'>
             <div class='block-content-upload-file'>" : "";
        $block_end = $use_block == true ?
                "</div></div>" : "";
        $block_button_delete = $use_delete == true ?
                "<a id='btn-delete-image-$input_name' data-name='$input_name' data-info='$image_data' /
            class='btn-delete-image'> <i class='fa fa-times text-danger'></i> </a>" : "";
        $pdf_start = strpos($image_filename, 'pdf') !== false ?
                "<a href='" . base_url() . $image_path . "' download>" : "";
        $pdf_end = strpos($image_filename, 'pdf') !== false ?
                "</a>" : "";
        $span_upload = is_file($image_realpath) ? "span-upload" : "";
        $input = $block_start .
                "<div class='mb-5'>
                    <label class='custom-upload-block'>
                    <input class='$input_class' 
                         type='file' 
                         id='$input_name' name='$input_name' 
                         placeholder='$label_name'
                         value='$input_value'> 
                    <input type='hidden' id='" . $input_name . "_data' value='$image_data' />
                    <input type='hidden' id='" . $input_name . "_filename' value='$image_filename' />
                    <span id='span_$input_name'  class='custom-upload " . $span_upload . "'>
                        " . $pdf_start . "
                        <img class='img-upload' 
                            id='" . $input_name . "_preview' 
                            src='$default_image' alt='$default_image' />
                        <img src='$icon_upload' class='upload-icon' id='" . $input_name . "_upload_icon' $upload_icon_style />
                        " . $pdf_end . "
                        $block_button_delete
                    </span>
                    </label>
                </div>
                <div class='mb-5'>
                    <label id='" . $input_name . "_dimension'></label>
                    <label id='" . $input_name . "_size'></label>
                </div>" .
                $block_end;

        $label = aindo_basic_label($label_name, $requirement['requirement_text']);
        if ($is_inline) {
            return aindo_basic_form_group_inline($input, $label);
        } else {
            return aindo_basic_form_group($input, $label);
        }
    } else {
        print_r("aindo_basic_image INPUT_ID mandatory!");
        return "";
    }
    /*
     * inv_view_generate_image
     * OLD: $name, $requirement, $value, $module, 
     * $use_block = false, $image_path = "", 
     * $use_delete = false, $hide_upload_icon = false, 
     * $label_name = "", $data = "", 
     * $filename = ""
     */
}