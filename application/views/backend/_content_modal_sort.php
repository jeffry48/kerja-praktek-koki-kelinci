<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.btn_sort', function () {
            var id = $(this).attr("row-id");
            var name = $(this).attr("row-name");
            var style = $(this).attr("row-style");
            if (style == "text-info") {
                var text_style = "color:turquoise";
            } else if (style == "text-danger"){
                var text_style = "color:red";
            } else if (style == "text-success"){
                var text_style = "color:yellowgreen";
            } else {
                var text_style = "";
            }
            var message = "<?= $this->lang->line('confirmation_delete_message') ?>'<b style='" + text_style + "'>" + name + "</b>'?";
            document.getElementById("modal-title").innerHTML = "<?= $this->lang->line('confirmation_delete_title') ?>";
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_message").innerHTML = message;
            $('#modal-sort').modal('show');
        });
    });
</script>
<div class="modal" id="modal-sort" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= $form_delete ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Urutkan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="delete_id" value="">
                    <p id="delete_message"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" name="submit"><?= $this->lang->line('action_save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>