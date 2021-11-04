<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <?php include '_content_meta.php'; ?>
        <!-- Icons -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/backend/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/backend/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/backend/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->
        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/backend/css/codebase.min.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <div class="" style="<?= "background:" . $this->config->item('background_color') ?>">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <div class="py-30 text-center">
                                    <a class="link-effect font-w700" href="<?= base_url() . "webmember" ?>">
                                        <?= $this->lang->line('application_themed_title') ?>
                                    </a>
                                </div>
                                <form class="js-validation-register" action="<?= $form_action ?>" method="post">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-sea">
                                            <h3 class="block-title">Please add your details</h3>
                                        </div>
                                        <div class="block-content">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <?php
                                                    if ($message != null || $message != "") {
                                                        ?>
                                                        <div class="alert alert-<?= $notification ?> alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <?= $message ?>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="name"><?= $this->lang->line('label_name') ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="js-maxlength form-control" 
                                                           maxlength='50' 
                                                           placeholder="<?= $this->lang->line('label_name') ?>"
                                                           id="name" name="name" 
                                                           value="<?= $name ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="username"><?= $this->lang->line('label_username') ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="js-maxlength form-control" 
                                                           maxlength='20' 
                                                           placeholder="<?= $this->lang->line('label_username') ?>"
                                                           id="username" name="username" 
                                                           value="<?= $username ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="email"><?= $this->lang->line('label_email') ?> <span class="text-danger">*</span></label>
                                                    <input type="text" class="js-maxlength form-control" 
                                                           maxlength='50' 
                                                           placeholder="<?= $this->lang->line('label_email') ?>"
                                                           id="email" name="email" 
                                                           value="<?= $email ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="password"><?= $this->lang->line('label_password') ?> <span class="text-danger">*</span></label>
                                                    <input type="password" class="js-maxlength form-control" 
                                                           maxlength='20' 
                                                           placeholder="<?= $this->lang->line('label_password') ?>"
                                                           id="password" name="password" 
                                                           value="<?= $password ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="retype_password"><?= $this->lang->line('label_retype_password') ?> <span class="text-danger">*</span></label>
                                                    <input type="password" class="js-maxlength form-control" 
                                                           maxlength='20' 
                                                           placeholder="<?= $this->lang->line('label_retype_password') ?>"
                                                           id="retype_password" name="retype_password" 
                                                           value="<?= $retype_password ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="address"><?= $this->lang->line('label_address') ?></label>
                                                    <textarea class='js-maxlength form-control' 
                                                              maxlength='100' 
                                                              id='address' name='address' rows='3' 
                                                              placeholder='<?= $this->lang->line('label_address') ?>'><?= $address ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="phone"><?= $this->lang->line('label_phone') ?></label>
                                                    <input type="text" class="js-maxlength form-control" 
                                                           maxlength='50' 
                                                           placeholder="<?= $this->lang->line('label_phone') ?>"
                                                           id="phone" name="phone" 
                                                           value="<?= $phone ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-12 text-sm-right push">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="fa fa-plus mr-10"></i> <?= $this->lang->line('action_register') ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content bg-body-light">
                                            <div class="form-group text-center">
                                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="<?= base_url() . "webmember" ?>">
                                                    <i class="fa fa-arrow-left mr-5"></i> <?= $this->lang->line('action_back') ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


        <!-- Page JS Code -->
        <!-- Codebase Core JS -->
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/codebase.js"></script>

        <script src="<?= base_url() ?>assets/backend/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script>
            $('.js-maxlength').maxlength({
                alwaysShow: false,
                warningClass: "badge badge-info",
                limitReachedClass: "badge badge-danger",
            });
        </script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url() ?>assets/backend/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script type="text/javascript">
            /*
             *  Document   : op_auth_signin.js
             *  Author     : pixelcave
             *  Description: Custom JS code used in Sign In Page
             */

            var OpAuthSignIn = function () {
                // Init Sign In Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
                var initValidationSignIn = function () {
                    jQuery('.js-validation-register').validate({
                        errorClass: 'invalid-feedback animated fadeInDown',
                        errorElement: 'div',
                        errorPlacement: function (error, e) {
                            jQuery(e).parents('.form-group > div').append(error);
                        },
                        highlight: function (e) {
                            jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
                        },
                        success: function (e) {
                            jQuery(e).closest('.form-group').removeClass('is-invalid');
                            jQuery(e).remove();
                        },
                        rules: {
                            'name': {
                                required: true,
                                minlength: 3
                            },
                            'username': {
                                required: true,
                                minlength: 4,
                                remote: {
                                    url: "<?= base_url() ?>webmember/check_remote_username",
                                    type: "post"
                                }
                            },
                            'password': {
                                required: true,
                                minlength: 5
                            },
                            'retype_password': {
                                required: true,
                                minlength: 5
                            },
                            'email': {
                                required: true,
                                minlength: 5
                            },
                        },
                        messages: {
                            'name': {
                                required: 'Masukkan nama',
                                minlength: 'Username harus berisi minimal 3 alfabet'
                            },
                            'username': {
                                required: 'Masukkan username',
                                minlength: 'Username harus berisi minimal 4 alfabet',
                                remote: 'Username sudah terpakai'
                            },
                            'password': {
                                required: 'Masukkan password',
                                minlength: 'Password harus berisi minimal 5 alfabet'
                            },
                            'retype_password': {
                                required: 'Masukkan konfirmasi password baru',
                                minlength: 'Konfirmasi password baru harus berisi minimal 5 alfabet'
                            },
                            'email': {
                                required: 'Masukkan email',
                                minlength: 'Username harus berisi minimal 5 alfabet'
                            },
                        }
                    });
                };

                return {
                    init: function () {
                        // Init Sign In Form Validation
                        initValidationSignIn();
                    }
                };
            }();

            // Initialize when page loads
            jQuery(function () {
                OpAuthSignIn.init();
            });
        </script>
    </body>
</html>
