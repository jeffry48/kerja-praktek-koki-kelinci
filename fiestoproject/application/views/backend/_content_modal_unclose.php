<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.btn_unclose', function () {
            var id = $(this).attr("row-id");
            var name = $(this).attr("row-name");
            var message = "<?= $this->lang->line('confirmation_unclose_message') ?>'<b style='color: red;'>" + name + "</b>'?";
            document.getElementById("unclose_id").value = id;
            document.getElementById("unclose_message").innerHTML = message;
            $('#modal-unclose').modal('show');
        });
    });
</script>
<div class="modal" id="modal-unclose"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= $form_unclose ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"><?= $this->lang->line('confirmation_unclose_title') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="unclose_id" value="">
                    <p id="unclose_message"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal"><?= $this->lang->line('action_back') ?></button>
                    <button class="btn btn-danger" type="submit" name="submit"><?= $this->lang->line('action_unclose') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>