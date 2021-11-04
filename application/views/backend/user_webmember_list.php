<div class="">
    <table id="stacktable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center"><?= $this->lang->line('label_username') ?></th>
                <th class="text-center d-none d-sm-table-cell"><?= $this->lang->line('label_name') ?></th>
                <th class="text-center d-none d-sm-table-cell"><?= $this->lang->line('label_address') ?></th>
                <th class="text-center d-none d-sm-table-cell"><?= $this->lang->line('label_phone') ?></th>
                <th class="text-center d-none d-sm-table-cell"><?= $this->lang->line('label_email') ?></th>
                <th class="text-center d-none d-sm-table-cell"><?= $this->lang->line('label_status') ?></th>
                <th class="text-center"><?= $this->lang->line('label_action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if (count($webmembers) > 0) {
                foreach ($webmembers as $single) {
                    $id = $single['id'];
                    $parameter_link = "$offset_parameter_buffer/id/$id/$search_parameter_buffer";
                    if ($single['username'] == "admin") {
                        continue;
                    }
                    ?>
                    <tr id="<?= $module.$single['id'] ?>">
                        <td><?= $single['username'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $single['name'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $single['address'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $single['phone'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $single['email'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $this->lang->line($single['status']) ?></td>
                        <td>
                            <?php
                            if (!$forbidden_view) {
                                ?>
                                <a href="<?= base_url() ?>user_webmember/view/<?= $parameter_link ?>"
                                   title="<?= $this->lang->line('action_view') ?>" 
                                   class="btn mb-5 btn-secondary btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <?php
                            }
                            if (!$forbidden_view) {
                              ?>
                                <a href="<?= base_url() ?>user_webmember/view_card/<?= $parameter_link ?>"
                                   target="_blank"
                                   title="<?= $this->lang->line('action_view_card') ?>"
                                   class="btn mb-5 btn-secondary btn-sm">
                                    <i class="fa fa-id-card"></i>
                                </a>
                              <?php
                            }
                            if (!$forbidden_edit && $single['username'] != $this->config->item('default_username')) {
                                ?>
                                <a href="<?= base_url() ?>user_webmember/edit/<?= $parameter_link ?>"
                                   title="<?= $this->lang->line('action_edit') ?>" 
                                   class="btn mb-5 btn-secondary btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <?php
                            }
                            if (!$forbidden_edit && $single['status'] == $this->config->item('status_pending')) {
                                ?>
                                <a href="<?= base_url() ?>user_webmember/activate/<?= $parameter_link ?>"
                                   title="<?= $this->lang->line('action_activate') ?>" 
                                   class="btn mb-5 btn-secondary btn-sm">
                                    <i class="fa fa-check-circle"></i>
                                </a>
                                <?php
                            }
                            if (!$forbidden_delete && $single['username'] != $this->config->item('default_username')) {
                                ?>
                                <a title="<?= $this->lang->line('action_delete') ?>" 
                                   row-id="<?= $single['id'] ?>"
                                   row-name="<?= $single['name'] ?>"
                                   class="btn mb-5 btn-secondary btn-sm btn_delete">
                                    <i class="fa fa-remove"></i>
                                </a>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include '_content_pagination.php';
?>