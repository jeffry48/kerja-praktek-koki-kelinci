<?php
require_once '_content_modal_info.php';
?>
<script type="text/javascript">
    $(document).ready(function () {
        var _URL = window.URL || window.webkitURL;
        //UBAH JADI SINGLE JANGAN PAKAI EACH, CONTOH PAKAI DELETE IMAGE
        $('.file-upload').each(function () {
            var input_id = this.id;
            $("#" + input_id).change(function () {
                var file = this.files[0];
                var fileType = file['type'];
                var validImageTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/png'];
                var validNonImageTypes = ['application/pdf'];
                if ($.inArray(fileType, validImageTypes) < 0) {
                    // invalid file type code goes here.
                    if ($.inArray(fileType, validNonImageTypes) < 0) {
                        var file_type = file.type;
                        if (file_type == "") {
                            file_type = file.name.substr((file.name.lastIndexOf('.') + 1));
                        }
                        document.getElementById("modal-title").innerHTML = "<?= $this->lang->line('notification_upload_preview_error') ?>";
                        document.getElementById("modal-message").innerHTML =
                                "<?= $this->lang->line('notification_upload_preview_wrong_file_type') ?>" +
                                "<br/><br/><?= $this->lang->line('information_your_uploaded_file') ?>:<br/>" +
                                "<label class='text-danger'>'" + file.name + "</label> <label class='text'>(" + file_type + ")" + "'</label><br/>";
                        $('#modal-info').modal('show');

                        $("#" + input_id + "_dimension").hide();
                        $("#" + input_id + "_size").hide();
                        $("#" + input_id + "_dimension").html("");
                        $("#" + input_id + "_size").html("");
                    } else {
                        $("#" + input_id + "_dimension").hide();
                        $("#" + input_id + "_size").show();
                        $("#" + input_id + "_dimension").html("");
                        $("#" + input_id + "_size").html("");

                        $("#" + input_id + "_preview").attr('src', "<?= base_url() . 'images/checked_document.png' ?>");
                        $("#" + input_id + "_preview").attr('class', "img-fluid img-upload");

                        $("#" + input_id + "_upload_icon").hide();
                        $("#" + input_id).submit();
                    }
                } else {
                    // valid file type code goes here.
                    img = new Image();
                    img.onload = function () {
                        if (file.size > <?= $this->config->item('max_allow_file_size') ?>) {
                            document.getElementById("modal-title").innerHTML = "<?= $this->lang->line('notification_upload_preview_error') ?>";
                            document.getElementById("modal-message").innerHTML =
                                    "<?= $this->lang->line('notification_upload_preview_file_size_too_big') ?><br/>" +
                                    "<br/><?= $this->lang->line('label_filename') ?>" +
                                    "<br/><label class='text-danger'>'" + file.name + "'</label>" +
                                    "<br/><?= $this->lang->line('information_file_size_uploaded') ?>" +
                                    "<br/><label class='text-danger'>' " + $.fn.format_number_decimal((file.size / 1000), 0) + " kb" + " '</label>" +
                                    "<br/><?= $this->lang->line('information_max_allow_file_size') ?>" +
                                    "<br/><label class='text-info'>' " + $.fn.format_number_decimal((<?= $this->config->item('max_allow_file_size') ?> / 1000), 0) + " kb" + " '</label><br/>";
                            $('#modal-info').modal('show');

                            $("#" + input_id + "_dimension").hide();
                            $("#" + input_id + "_size").hide();
                            $("#" + input_id + "_dimension").html("");
                            $("#" + input_id + "_size").html("");
                        } else if (this.width > <?= $this->config->item('max_allow_width') ?> || this.height > <?= $this->config->item('max_allow_height') ?>) {
                            document.getElementById("modal-title").innerHTML = "<?= $this->lang->line('notification_upload_preview_error') ?>";
                            document.getElementById("modal-message").innerHTML =
                                    "<?= $this->lang->line('notification_upload_preview_dimension_too_big') ?><br/>" +
                                    "<br/><?= $this->lang->line('label_filename') ?>" +
                                    "<br/><label class='text-danger'>'" + file.name + "'</label>" +
                                    "<br/><?= $this->lang->line('information_dimension_uploaded') ?>" +
                                    "<br/><label class='text-danger'>'" + this.width + " x " + this.height + "'</label>" +
                                    "<br/><?= $this->lang->line('information_max_allow_dimension') ?>" +
                                    "<br/><label class='text-info'>'" + <?= $this->config->item('max_allow_width') ?> + " x " + <?= $this->config->item('max_allow_height') ?> + "'</label><br/>";
                            $('#modal-info').modal('show');

                            $("#" + input_id + "_dimension").hide();
                            $("#" + input_id + "_size").hide();
                            $("#" + input_id + "_dimension").html("");
                            $("#" + input_id + "_size").html("");
                        } else {

                            $("#" + input_id + "_preview").attr('src', img.src);
                            $("#" + input_id + "_preview").attr('class', "img-fluid img-upload");

                            $("#" + input_id + "_upload_icon").hide();
                            $("#" + input_id).submit();
                        }
                    };
                    img.src = _URL.createObjectURL(file);
                }
            });
        });

        $('.file-upload').on('submit', (function (e) {
            var name = $(this).attr('name');
            var id = $(this).attr('id');
            var data = $("#" + id + "_data").val();
            var real_filename = this.files[0]['name'];
            var extension = real_filename.substring(real_filename.lastIndexOf(".") + 1, real_filename.length);
            var form_data = new FormData();
            form_data.append("name", name);
            form_data.append("data", data);
            form_data.append("extension", extension);
            form_data.append(name, this.files[0]);
            e.preventDefault();
            $.ajax({
                url: "<?= base_url() . $module ?>/upload_file_api/<?= $module ?>/",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $("#block_image_" + name).toggleClass('block-mode-loading');
                    $("#" + id).prop("disabled", true);
                },
                success: function (data) {
                    console.log(data);
                    data = JSON.parse(data);
                    $("#span_" + name).toggleClass('span-upload');
                    $("#block_image_" + name).removeClass('block-mode-loading');
                    $("#" + name + "_filename").val(data[1] + "." + extension);
                },
                error: function (data) {
                    console.log(data);
                    $("#block_image_" + name).removeClass('block-mode-loading');
                    $("#" + id).prop("disabled", false);
                }
            });
        }));
    });

    $('.btn-delete-image').click(function (e) {
        var name = $(this).data('name');
        var data = $(this).data('info');
        var filename = $("#" + name + "_filename").val();
        var form_data = new FormData();
        form_data.append("filename", filename);
        form_data.append("data", data);
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() . $module ?>/delete_file_api/<?= $module ?>/",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                return confirm(" <?= $this->lang->line('confirmation_delete_document_message') ?>");
                $("#block_image_" + name).toggleClass('block-mode-loading');
            },
            success: function (data) {
                data = JSON.parse(data);
                $("#span_" + name).toggleClass('span-upload');
                $("#block_image_" + name).removeClass('block-mode-loading');
                if (data.status == "success") {
                    $("#" + name + "_preview").removeClass('img-fluid');
                    $("#span_" + name).removeClass('span-upload');
                    $("#" + name + "_preview").attr('src', "<?= base_url("/images/blank.png"); ?>");
                    $("#" + name).prop("disabled", false);
                    $("#" + name + "_upload_icon").show();
                    $("#" + name + "_dimension").hide();
                    $("#" + name + "_size").hide();
                    $("#" + name + "_dimension").html("");
                    $("#" + name + "_size").html("");
                }
            },
            error: function (data) {
                console.log(data);
                $("#block_image_" + name).removeClass('block-mode-loading');
            }
        });
    });
</script>