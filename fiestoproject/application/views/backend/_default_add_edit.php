<div class="row">
    <div class="col-md-12">
        <?php
        foreach ($structures as $structure) {
            switch ($structure['type']) {
                case 'textfield':
                    echo aindo_basic_textfield(array(
                        'input_id' => $structure['name'],
                        'forbidden_superedit' => isset($structure['superedit']) ? $structure['superedit'] : false,
                        'mode' => $mode,
                        'requirement' => $requirement_name
                    ));
                    break;
                case 'password':
                    echo aindo_basic_textfield(array(
                        'input_id' => $structure['name'],
                        'input_type' => 'password',
                        'mode' => $mode,
                        'requirement' => $requirement_name
                    ));
                    break;
                case 'combobox':
                    echo aindo_basic_combobox(array(
                        'input_id' => 'role',
                        'input_name' => 'role',
                        'input_value_option' => $role_option,
                        'input_value_option_selected' => $role_option_selected,
                        'requirement' => $requirement_role,
                    ));
                    break;
                case 'chain_combobox':
                    echo aindo_basic_combobox(array(
                        'input_id' => 'role',
                        'input_name' => 'role',
                        'input_value_option' => $role_option,
                        'input_value_option_selected' => $role_option_selected,
                        'requirement' => $requirement_role,
                        'target_url' => $structure['target_url'],
                        'listen_to' => $structure['listen_to'],
                    ));
                    break;
                case 'textarea':
                    echo aindo_basic_textarea(array(
                        'input_id' => $structure['name'],
                        'input_name' => $structure['name'],
                        'requirement' => $requirement_address,
                    ));
                    break;
                case 'datefield':
                    echo aindo_basic_textfield(array(
                        'input_id' => $structure['name'],
                        'input_name' => $structure['name'],
                        'input_class' => 'datepicker',
                        'forbidden_superedit' => isset($structure['superedit']) ? $structure['superedit'] : false,
                        'mode' => $mode,
                        'requirement' => $requirement_name
                    ));
                    break;
            }
        }
        ?>
    </div>
</div>