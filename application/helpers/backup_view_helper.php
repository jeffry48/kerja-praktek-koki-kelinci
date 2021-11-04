<?php

function inv_view_basic_label($label_name, $required) {
    $ci = & get_instance();
    return "<label class = 'text-primary'>$label_name $required</label>";
}

function inv_view_basic_form_group($input = "", $label = "") {
    return "<div class='form-group'>
                    $label
                    $input
            </div>";
}

function inv_view_basic_form_group_inline($input = "", $label = "") {
    return "<div class='form-group'>
                <div class='row align-items-center'>
                        <div class='col-sm-6'>
                                $label
                        </div>
                        <div class='col-sm-6'>
                                $input
                        </div>
                </div>
            </div>";
}

function inv_view_basic_rounded_button($name) {
    return "<a href='#' class='btn btn-primary rounded-button' type='submit'>+</a>";
}

function inv_view_basic_custom_checkbox($id, $name, $value, $label, $is_checked, $class_name, $is_disabled = true) {
    if ($is_checked) {
        if($is_disabled){
          $checked = "checked disabled";
        } else {
          $checked = "checked";
        }
    } else {
        $checked = "";
    }
    return "
	<label class='custom-check'>
        <input type='checkbox' id='$id' name='$name' value='$value' class='$class_name' $checked>
		<span class='checkmark'></span>
		<div>$label</div>
	</label>
	";
}

function inv_view_basic_custom_radio($id, $name, $value, $label, $is_checked) {
    if ($is_checked) {
        $checked = "checked disabled";
    } else {
        $checked = "";
    }
    return "
	<label class='custom-check'>$label
            <input type='radio' id='$id' name='$name' value='$value' $checked>
	  <span class='checkmark'></span>
	</label>
	";
}

function inv_view_generate_superedit_textfield($name, $requirement, $forbidden_superedit, $mode, $value) {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    if ($mode == $ci->config->item('edit') && $forbidden_superedit) {
        $input = "<label class='font-s14 line-height41'>$value</label>
        <input type='hidden' id='$name' name='$name' value='$value' />";
    } else {
        $max_length = $requirement['max_length'];
        $input = "<input class='js-maxlength form-control' 
                       type='text' 
                       maxlength='$max_length' 
                       id='$name' name='$name' 
                       placeholder='$label_name'
                       value='$value'>";
    }
    return inv_view_basic_form_group($input, $label);
}

function inv_view_generate_superedit_textfield_inline($name, $requirement, $forbidden_superedit, $mode, $value) {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    if ($mode == $ci->config->item('edit') && $forbidden_superedit) {
        $input = "<label class='font-s14 line-height41'>$value</label>
        <input type='hidden' id='$name' name='$name' value='$value' />";
    } else {
        $max_length = $requirement['max_length'];
        $input = "<input class='js-maxlength form-control' 
                       type='text' 
                       maxlength='$max_length' 
                       id='$name' name='$name' 
                       placeholder='$label_name'
                       value='$value'>";
    }
    return inv_view_basic_form_group_inline($input, $label);
}

function inv_view_generate_textfield($name, $requirement, $value, $custom_class = "") {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);
    $max_length = $requirement['max_length'];

    $attribute = "";
    if ($custom_class != "") {
        if (strpos($custom_class, "datepicker") !== false) {
            $attribute .= "data-date-format='" . $ci->config->item('default_date_format') . "' ";
            $attribute .= "autocomplete='off'";
        } else {
            $attribute .= $custom_class;
        }
    }
    $input = "<input class='form-control $custom_class' 
                   type='text' 
                   maxlength='$max_length' 
                   id='$name' name='$name' 
                   placeholder='$label_name'
                   value='$value'
                   $attribute
                   >";
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    return inv_view_basic_form_group($input, $label);
}

function inv_view_generate_numberfield($name, $requirement, $value, $custom_class = "") {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);
    $max_length = $requirement['max_length'];

    $attribute = "";
    $input = "<input class='form-control $custom_class' 
                   type='number' 
                   maxlength='$max_length' 
                   id='$name' name='$name' 
                   placeholder='$label_name'
                   value='$value'
                   $attribute
                   >";
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    return inv_view_basic_form_group($input, $label);
}

function inv_view_generate_textarea($name, $requirement, $value, $rows = '3') {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);
    $max_length = $requirement['max_length'];

    $input = "<textarea class='form-control js-summernote' 
                  maxlength='$max_length' 
                  id='$name' name='$name' rows='$rows' 
                  placeholder='$label_name'>$value</textarea>";
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    return inv_view_basic_form_group($input, $label);
}

function inv_view_generate_combobox($name, $requirement, $value_option, $value_option_selected) {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);

    $input = form_dropdown($name, $value_option, $value_option_selected, "id='$name' class='js-select2 form-control' style='width:100%'");
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    return inv_view_basic_form_group($input, $label);
}

function inv_view_generate_combobox_inline($name, $requirement, $value_option, $value_option_selected) {
    $ci = & get_instance();
    $label_name = $ci->lang->line('label_' . $name);

    $input = form_dropdown($name, $value_option, $value_option_selected, "id='$name' class='js-select2 form-control' style='width:100%'");
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    return inv_view_basic_form_group_inline($input, $label);
}

function inv_get_image_url($path, $name, $search = '', $replace = ''){
    if ($search != '' && $replace != '') {
      $name = str_replace($search, $replace, $name);
    }
    $image_path = $path.'/'.$name;
    $image_realpath = realpath($image_path);
    if (!is_file($image_realpath)) {
      $default_image = base_url() . 'images/noimage_small.png';
    } else {
      $default_image = base_url() . $image_path;
    }
    return $default_image;
}

function inv_view_generate_image($name, $requirement, $value, $module, $use_block = false, $image_path = "", $use_delete = false, $hide_upload_icon = false, $label_name = "", $data = "", $filename = "") {
    $ci = & get_instance();
    $icon_upload = base_url() . 'images/icons_upload.svg';
    if ($label_name == "") {
        $label_name = $ci->lang->line('label_' . $name);
    }
    if (!isset($value)) {
        $value = "";
    }

    if ($image_path == "") {
        $image_path = $ci->config->item('default_' . $module . '_image_url') . $value;
    }
    $image_realpath = realpath($image_path);
    $default_image = base_url() . $image_path;
    if (!is_file($image_realpath)) {
        $default_image = base_url() . 'images/blank.png';
    }
    if (strpos($filename, 'pdf') !== false) {
      $default_image = base_url() . 'images/pdf.png';
    }
    if ($hide_upload_icon) {
        $upload_icon_style = "style='display: none;'";
    } else {
        $upload_icon_style = "";
    }
    $block_start = $use_block == true ?
            "<div id='block_image_$name' class='block'>
        <div class='block-content-upload-file'>" : "";
    $block_end = $use_block == true ?
            "</div></div>" : "";
    $block_button_delete = $use_delete == true ?
            "<a id='btn-delete-image-$name' data-name='$name' data-info='$data' /
            class='btn-delete-image'> <i class='fa fa-times text-danger'></i> </a>" : "";
    $pdf_start = strpos($filename, 'pdf') !== false ?
            "<a href='".base_url().$image_path."' download>" : "";
    $pdf_end = strpos($filename, 'pdf') !== false ?
            "</a>" : "";
    $span_upload = is_file($image_realpath) ? "span-upload" : "";
    $input = $block_start .
            "<div class='mb-5'>
                    <label class='custom-upload-block'>
                    <input class='fform-control-file file-upload' 
                         type='file' 
                         id='$name' name='$name' 
                         placeholder='$label_name'
                         value='$value'> 
                    <input type='hidden' id='" . $name . "_data' value='$data' />
                    <input type='hidden' id='" . $name . "_filename' value='$filename' />
                    <span id='span_$name'  class='custom-upload " . $span_upload . "'>
                        ".$pdf_start."
                        <img class='img-upload' 
                            id='" . $name . "_preview' 
                            src='$default_image' alt='$default_image' />
                        ".$pdf_end."
                        <img src='$icon_upload' class='upload-icon' id='" . $name . "_upload_icon' $upload_icon_style />
                        $block_button_delete
                    </span>
                    </label>
                </div>
                <div class='mb-5'>
                    <label id='" . $name . "_dimension'></label>
                    <label id='" . $name . "_size'></label>
                </div>" .
            $block_end;
    $label = inv_view_basic_label($label_name, $requirement['requirement_text']);
    return inv_view_basic_form_group($input, $label);
}
