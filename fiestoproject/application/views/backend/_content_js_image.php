<script type="text/javascript">
    $(document).ready(function () {
        var _URL = window.URL || window.webkitURL;

<?php
foreach ($this->data['form_images'] as $form_image) {
    ?>
            $("#<?= $form_image ?>").change(function () {
                var file, img;

                if ((file = this.files[0])) {
                    img = new Image();
                    img.onload = function () {
                        if (file.size > <?= $this->config->item('max_allow_file_size') ?>) {
                            document.getElementById("info-title").innerHTML = "<?= $this->lang->line('information_upload_preview_error') ?>";
                            document.getElementById("info-message").innerHTML =
                                    "<?= $this->lang->line('information_upload_preview_file_size_too_big') ?><br/>" +
                                    "<br/>Nama File:" +
                                    "<br/><label class='text-danger'>'" + file.name + "</label>" +
                                    "<br/>Ukuran file yang anda upload adalah:" +
                                    "<br/><label class='text-danger'>'" + $.fn.format_number_decimal((file.size / 1000), 0) + " kb" + "'</label>" +
                                    "<br/>Maksimum dimensi file yang diperbolehkan adalah:" +
                                    "<br/><label class='text-info'>'" + $.fn.format_number_decimal((<?= $this->config->item('max_allow_file_size') ?> / 1000), 0) + " kb" + "'</label><br/>";
                            $('#modal-small').modal('show');

                            $("#<?= $form_image ?>_dimension").html("");
                            $("#<?= $form_image ?>_size").html("");
                            $("#<?= $form_image ?>_preview").attr('src', "<?= base_url() . 'images/upload.png' ?>");
                        } else if (this.width > <?= $this->config->item('max_allow_width') ?> || this.height > <?= $this->config->item('max_allow_height') ?>) {
                            document.getElementById("info-title").innerHTML = "<?= $this->lang->line('information_upload_preview_error') ?>";
                            document.getElementById("info-message").innerHTML =
                                    "<?= $this->lang->line('information_upload_preview_dimension_too_big') ?><br/>" +
                                    "<br/>Nama File:" +
                                    "<br/><label class='text-danger'>'" + file.name + "</label>" +
                                    "<br/>Dimensi file yang anda upload adalah:" +
                                    "<br/><label class='text-danger'>'" + this.width + " x " + this.height + "'</label>" +
                                    "<br/>Maksimum dimensi file yang diperbolehkan adalah:" +
                                    "<br/><label class='text-info'>'" + <?= $this->config->item('max_allow_width') ?> + " x " + <?= $this->config->item('max_allow_height') ?> + "'</label><br/>";
                            $('#modal-small').modal('show');

                            $("#<?= $form_image ?>_dimension").html("");
                            $("#<?= $form_image ?>_size").html("");
                            $("#<?= $form_image ?>_preview").attr('src', "<?= base_url() . 'images/upload.png' ?>");
                        } else {
                            $("#<?= $form_image ?>_dimension").html("<?= $this->lang->line('label_dimension') ?>: " + this.width + " x " + this.height);
                            $("#<?= $form_image ?>_size").html("<?= $this->lang->line('label_file_size') ?> : " + $.fn.format_number_decimal((file.size / 1000), 0) + " kb");
                            $("#<?= $form_image ?>_preview").attr('src', img.src);
                            $("#<?= $form_image ?>_preview").attr('class', "img-fluid img-upload");
                        }
                    };
                    img.onerror = function () {
                        document.getElementById("info-title").innerHTML = "<?= $this->lang->line('information_upload_preview_error') ?>";
                        document.getElementById("info-message").innerHTML =
                                "<?= $this->lang->line('information_upload_preview_wrong_file_type') ?>" +
                                "<br/><br/>File yang anda upload adalah:<br/>" +
                                "<label class='text-danger'>'" + file.name + "</label> <label class='text'>(" + file.type + ")" + "'</label><br/>";
                        $('#modal-small').modal('show');

                        $("#<?= $form_image ?>_dimension").html("");
                        $("#<?= $form_image ?>_size").html("");
                        $("#<?= $form_image ?>_preview").attr('src', "<?= base_url() . 'images/upload.png' ?>");
                    };

                    img.src = _URL.createObjectURL(file);
                }
            });
    <?php
}
?>

    });
</script>