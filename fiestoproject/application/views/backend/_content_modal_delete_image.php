<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.btn_delete_img', function () {
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
            var message = "<?= $this->lang->line('confirmation_delete_image_message') ?>";
            document.getElementById("modal-title").innerHTML = "<?= $this->lang->line('confirmation_delete_title') ?>";
            document.getElementById("delete_id").value = id;
            document.getElementById("image_preview").src = name;
            document.getElementById("image_preview").alt = name;
            document.getElementById("delete_message").innerHTML = message;
            $('#modal-delete-img').modal('show');
        });
    });
</script>
<div class="modal" id="modal-delete-img" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= $form_delete ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="delete_id" value="">
                    <p id="delete_message"></p>
                    <div class="text-center">
                        <img class="img-fluid" id="image_preview" src="" alt="" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal"><?= $this->lang->line('action_back') ?></button>
                    <button class="btn btn-danger" type="submit" name="submit"><?= $this->lang->line('action_delete') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>