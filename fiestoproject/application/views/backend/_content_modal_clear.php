<?php
$form_clear = "";
?>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.btn_clear', function () {
            $('#modal-clear').modal('show');
        });
    });
</script>
<div class="modal" id="modal-clear" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"><?= $this->lang->line('confirmation_clear_title') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="clear_message"><?= $this->lang->line('confirmation_clear_message') ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"><?= $this->lang->line('action_back') ?></button>
                <button class="btn btn-danger" type="submit" name="submit" id="clear_button"><?= $this->lang->line('action_clear') ?></button>
            </div>
        </div>
    </div>
</div>