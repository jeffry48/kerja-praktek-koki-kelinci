<!-- Codebase Core JS -->
<script src="<?= base_url() ?>assets/backend/js/core/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.scrollLock.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.appear.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/jquery.countTo.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/core/js.cookie.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/codebase.js"></script>
<?php
if (isset($use_datepicker) && $use_datepicker) {
    ?>
    <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            <?php
            $date = strtotime(date('Y-m-d').' -10 year');
            $date = date('d/m/Y', $date);
            echo "var defaultViewDate = '".$date."';";
            ?>
            //https://github.com/uxsolutions/bootstrap-datepicker
            $('.datepicker').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true,
            });
            $('.datepicker-birthdate').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true,
                startView: 'years',
                orientation: 'auto bottom',
                defaultViewDate: defaultViewDate,
            });
        });
    </script>
    <?php
}
if (isset($use_masked_time) && $use_masked_time) {
    ?>
    <script src="<?= base_url() ?>assets/backend/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $(".js-masked-time").mask("99:99");
        });
    </script>
    <?php
}
if (isset($use_select2) && $use_select2) {
    ?>
    <script src="<?= base_url() ?>assets/backend/js/plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript">
        $('select').select2();
    </script>
    <?php
}
if (isset($use_maxlength) && $use_maxlength) {
    ?>
    <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script>
        $('.js-maxlength').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-danger",
        });
    </script>
    <?php
}
if (isset($use_summernote) && $use_summernote) {
    ?>
    <script src="<?= base_url() ?>assets/backend/js/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-summernote/bootstrap-summernote.min.js"></script>
    <script>
        jQuery('.js-summernote:not(.js-summernote-enabled)').each(function () {
            var summernote = jQuery(this);

            // Add .js-summernote-enabled class to tag it as activated
            summernote.addClass('js-summernote-enabled');

            // Init
            summernote.summernote({
                height: 150,
                minHeight: null,
                maxHeight: null,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
    <?php
}
if (isset($use_cropper) && $use_cropper) {
    ?>
    <script src="<?= base_url() ?>assets/backend/js/plugins/croppie/croppie.js"></script>
    <?php
}
include '_content_js_custom.php';
if (isset($additional_js)) {
    foreach ($additional_js as $single) {
        include $single;
    }
}
?>