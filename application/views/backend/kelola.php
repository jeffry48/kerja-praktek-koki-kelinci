<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<!--[if lte IE 9]><html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <?php include '_content_meta.php'; ?>
        <?php include '_content_css_basic.php'; ?>
        <style>
            #main-container {
                padding-bottom: 0px;
            }
            a.link-effect:hover::before{text-decoration:none;background:transparent}
            a.link-effect img {
                width: 160px;
            }
            .content {
                align-items: center;
            }
            .form-control{
                height: auto;
                min-height: 45px;
            }
            .row.gutters-tiny {
                margin-top: 40px;
            }
            label {
                color: #064068;
            }
            a.link-effect {
                text-align: center;
                display: block;
                margin-bottom: 30px;
            }
            .bg-white {
                background-color: #f0f3f6 !important;
            }
            .form-login {
                background: #fff;
                padding: 25px 27px 3px;
            }
        </style>
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">
            <main id="main-container">
                <div class="bg-gd-sea">
                    <div class="row justify-content-center hero-static content content-full bg-white invisible" data-toggle="appear">
                        <div class="col-lg-4 mx-auto">
                            <div class="form-login">
                                <div id="alert-box">

                                </div>
                                <form id="login-form" class="js-validation-signin" method="post">
                                    <div class="form-group row">
                                        <div class="col-12 text-center">
                                            <img src="<?= base_url() ?>assets/backend/img/logo.svg" width="25%" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                                                <label for="username"><?= $this->lang->line('label_username') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>">
                                                <label for="password"><?= $this->lang->line('label_password') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-tiny">
                                        <div class="col-12 mb-10">
                                            <button id="btn-submit" type="submit" class="btn btn-block btn-hero btn-noborder btn-success">
                                                <i class="si si-login mr-10"></i> <?= $this->lang->line('action_login') ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


        <!-- Page JS Code -->
        <?php include '_content_js_basic.php'; ?>
        <!-- Page JS Plugins -->
        <script src="<?= base_url() ?>assets/backend/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#login-form").submit(function (e) {
                    e.preventDefault();
                    $("#alert-box").html('');
                    msg = "<div class=\"alert alert-danger alert-dismissable\">\n" +
                            "  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                            "  <span id=\"response_message\"><?= $this->lang->line('notification_login_wrong_username_password') ?></span>\n" +
                            "</div>";
                    var username = $("#username").val().trim();
                    var password = $("#password").val().trim();
                    if (username != "" && password != "") {
                        $.ajax({
                            url: "<?= $this->config->item('backend_server_url') ?>auth/login",
                            type: "POST",
                            data: {auth_username: username, auth_password: password},
                            crossOrigin: true,
                            success: function (response) {
                                if (response.token != '') {
                                    $.ajax({
                                        url: "kelola/store_token",
                                        type: "POST",
                                        data: {
                                            token: response.token,
                                            user_id: response.user_id,
                                            user_name: response.user_name,
                                            user_role: response.user_role,
                                            user_status: response.user_status,
                                            user_location: response.user_location,
                                        },
                                        success: function (response) {
                                            window.location = "dashboard";
                                            console.log("Credentials saved!");
                                        }
                                    });
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                console.log(xhr.status + ": " + thrownError);
                                $("#alert-box").html(msg);
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
