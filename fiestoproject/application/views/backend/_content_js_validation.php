<script type='text/javascript' >
    function required_text() {
        return "Field ini dibutuhkan";
    }

    function required_image() {
        return "Gambar dibutuhkan";
    }

    function min_length_text(length) {
        return "This field must be at least " + length + " characters in length.";
    }

    function max_length_text(length) {
        return "This field cannot exceed " + length + " characters in length.";
    }
</script>
<?php
$rules = "";
$messages = "";
if (isset($requirements)) {
    foreach ($requirements as $single) {
        if ($single['is_required'] == 1) {
            if ($single['type'] == $this->config->item('form_textfield') ||
                    $single['type'] == $this->config->item('form_textarea') ||
                    $single['type'] == $this->config->item('form_radio') ||
                    $single['type'] == $this->config->item('form_checkbox') ||
                    $single['type'] == $this->config->item('form_date')) {
                $is_required = "required: true,";
                $required_message = "required: required_text(),";
            } else if ($single['type'] == $this->config->item('form_image') && $mode == $this->config->item('add')) {
                $is_required = "required: true,";
                $required_message = "required: required_image(),";
            } else if ($single['type'] == $this->config->item('form_combobox')) {
                $is_required = "min: 1,";
                $required_message = "min: required_text(),";
            } else {
                $is_required = "";
                $required_message = "";
            }
        } else {
            $is_required = "";
            $required_message = "";
        }
        if ($single['min_length'] > 0) {
            $is_min_length = "minlength: " . $single['min_length'] . ",";
            $min_length_message = "minlength: min_length_text(rules." . $single['name'] . ".minlength),";
        } else {
            $is_min_length = "";
            $min_length_message = "";
        }
        if ($single['max_length'] > 0) {
            $is_max_length = "maxlength: " . $single['max_length'] . ",";
            $max_length_message = "maxlength: max_length_text(rules." . $single['name'] . ".maxlength),";
        } else {
            $is_max_length = "";
            $max_length_message = "";
        }

        $rules = $rules . "'" . $single['name'] . "': {" . $is_required . $is_max_length . $is_min_length . "},";
        $messages = $messages . "'" . $single['name'] . "': {" . $required_message . $max_length_message . $min_length_message . "},";
    }
}
?>
<script type="text/javascript">
    var rules = {<?= $rules ?>};
            var messages = {<?= $messages ?>};
</script>

<script src="<?= base_url() ?>assets/backend/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/plugins/jquery-validation/additional-methods.min.js"></script>
<script type="text/javascript">
    /*
     *  Document   : js_valdidation.php
     *  Description: Custom JS code used in Form Validation Page
     */

    var BaseFormValidation = function () {
        // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
        var initValidationBootstrap = function () {
            jQuery('.js-validation-bootstrap').validate({
                ignore: [],
                errorClass: 'invalid-feedback animated fadeInDown',
                errorElement: 'div',
                errorPlacement: function (error, e) {
                    jQuery(e).parents('.form-group > div > div').append(error);
                },
                highlight: function (e) {
                    jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
                },
                success: function (e) {
                    jQuery(e).closest('.form-group').removeClass('is-invalid');
                    jQuery(e).remove();
                },
                rules: rules,
                messages: messages,
            });
        };

        return {
            init: function () {
                initValidationBootstrap();

                // Init Validation on Select2 change
                jQuery('.js-select2').on('change', function () {
                    jQuery(this).valid();
                });
            }
        };
    }();

    // Initialize when page loads
    jQuery(function () {
        BaseFormValidation.init();
    });
</script>
