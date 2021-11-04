<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.btn_cancel', function () {
            var id = $(this).attr("row-id");
            var name = $(this).attr("row-name");
            var message = "<?= $this->lang->line('confirmation_cancel_message') ?>'<b style='color: red;'>" + name + "</b>'?";
            document.getElementById("cancel_id").value = id;
            document.getElementById("cancel_message").innerHTML = message;
            $('#modal-cancel').modal('show');
        });
    });
</script>
<div class="modal" id="modal-cancel"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= $form_cancel ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"><?= $this->lang->line('confirmation_cancel_title') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="cancel_id" value="">
                    <p id="cancel_message"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal"><?= $this->lang->line('action_back') ?></button>
                    <button class="btn btn-danger" type="submit" name="submit"><?= $this->lang->line('action_cancel') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>