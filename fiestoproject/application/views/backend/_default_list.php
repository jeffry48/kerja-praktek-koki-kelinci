<div class="">
    <table id="stacktable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <?php
                foreach($columns as $column) {
                ?>
                  <th class="text-center d-none d-sm-table-cell"><?= $this->lang->line('label_'.$column) ?></th>
                <?php
                }
                ?>
                <th class="text-center"><?= $this->lang->line('label_action') ?></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<?php
include '_content_pagination.php';
?>