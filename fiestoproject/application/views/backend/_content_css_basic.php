<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="<?= base_url() ?>assets/backend/img/favicons/favicon.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/backend/img/favicons/favicon-192x192.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/backend/img/favicons/apple-touch-icon-180x180.png">
<!-- END Icons -->
<link href="https://fonts.googleapis.com/css?family=Oswald|Roboto:400,500" rel="stylesheet">
<?php
if (isset($use_datepicker) && $use_datepicker) {
    ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <!--<style>
        .datepicker {
            padding:.375rem .75rem;
        }
    </style>-->
    <?php
}
if (isset($use_select2) && $use_select2) {
    ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/select2/select2.min.css">
    <?php
}
if (isset($use_summernote) && $use_summernote) {
    ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/summernote/summernote-bs4.css">
    <?php
}

if (isset($use_cropper) && $use_cropper) {
  ?>
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/croppie/croppie.css" />
  <?php
}
?>

<!-- Stylesheets -->
<!-- Codebase framework -->
<link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/backend/css/codebase.min.css">


<link rel="stylesheet" href="<?= base_url() ?>assets/backend/css/style.css">
<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="<?= base_url() ?>assets/backend/css/themes/flat.min.css"> -->


<style>
    .sub_table_header {
        width: 30%;
    }
    .sub_table_divider {
        width: 5%;
    }
    .sub_table_content {
        width: 70%;
    }
    .font-s16 {
        font-size: 16px;
    }
    .font-s18 {
        font-size: 18px;
    }
    .font-s20 {
        font-size: 20px;
    }
    .font-s22 {
        font-size: 22px;
    }
    .font-s24 {
        font-size: 24px;
    }
    .font-s26 {
        font-size: 26px;
    }
</style>
<!-- END Stylesheets -->