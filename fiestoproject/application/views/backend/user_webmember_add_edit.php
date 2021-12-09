<div class="row">
    <div class="col-md-6">
        <?=
        aindo_basic_superedit_textfield(array(
            'input_id' => 'name',
            'input_value' => $name,
            'forbidden_superedit' => $forbidden_superedit,
            'mode' => $mode,
            'requirement' => $requirement_name
        ));
        ?>
        <?=
        aindo_basic_textarea(array(
            'input_id' => 'address',
            'input_name' => 'address',
            'input_value' => $address,
            'requirement' => $requirement_address,
        ));
        ?>
        <?=
        aindo_basic_textfield(array(
            'input_id' => 'phone',
            'input_name' => 'phone',
            'input_value' => $phone,
            'requirement' => $requirement_phone,
        ));
        ?>
        <?=
        aindo_basic_textfield(array(
            'input_id' => 'email',
            'input_name' => 'email',
            'input_value' => $email,
            'requirement' => $requirement_email,
        ));
        ?>
        <?php
        if ($birthdate == "" || $birthdate == "0000-00-00") {
            $birthdate_shown = "";
        } else {
            $birthdate_shown = inv_date_format_view($birthdate);
        }
        ?>
        <?=
        aindo_basic_textfield(array(
            'input_id' => 'birthdate',
            'input_name' => 'birthdate',
            'input_value' => $birthdate_shown,
            'input_class' => 'datepicker',
            'requirement' => $requirement_birthdate,
        ));
        ?>
    </div>
    <div class="col-md-6">
        <?=
        aindo_basic_superedit_textfield(array(
            'input_id' => 'username',
            'input_value' => $username,
            'forbidden_superedit' => $forbidden_superedit,
            'mode' => $mode,
            'requirement' => $requirement_username
        ));
        ?>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12">
                    <label class="text-primary"><?= $this->lang->line('label_password') ?></label>
                </div>
                <div class="col-sm-12">
                    <label class="form-control-plaintext"><?= $this->config->item('default_new_user_password') ?></label>
                    <label class="text-info"><?= $this->lang->line('label_note') . " " . $this->lang->line('information_changeable_password') ?></label>
                </div>
            </div>
        </div>
        <?=
        aindo_basic_combobox(array(
            'input_id' => 'status',
            'input_name' => 'status',
            'input_value_option' => $status_option,
            'input_value_option_selected' => $status_option_selected,
            'requirement' => $requirement_status,
        ));
        ?>
        <?=
        aindo_basic_textarea(array(
            'input_id' => 'notes',
            'input_name' => 'notes',
            'input_value' => $notes,
            'requirement' => $requirement_notes,
        ));
        ?>
        <?=
        aindo_basic_image(array(
            'input_id' => 'photo',
            'input_module' => $module,
            'input_name' => 'photo',
            'input_value' => $photo,
            'requirement' => $requirement_photo,
        ));
        ?>
        <?=
        aindo_basic_image(array(
            'input_id' => 'photo',
            'input_module' => $module,
            'input_name' => 'photo',
            'input_value' => $photo,
            'requirement' => $requirement_photo,
        ));
        ?>
    </div>
</div>