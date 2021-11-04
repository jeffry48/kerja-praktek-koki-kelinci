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
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/backend/js/plugins/summernote/summernote-bs4.css">
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
                                <form id="login-form" class="js-validation-signin" method="post">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-sea">
                                            <h3 class="block-title">Please Sign In</h3>
                                        </div>
                                        <div class="block-content">
                                            <div id="alert-box">

                                            </div>
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
                                                    <label for="username"><?= $this->lang->line('label_username') ?></label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="password"><?= $this->lang->line('label_password') ?></label>
                                                    <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-12 text-sm-right push">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="si si-login mr-10"></i> <?= $this->lang->line('action_login') ?>
                                                    </button>
                                                </div>
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


        <!-- Codebase Core JS -->
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url() ?>assets/backend/js/codebase.js"></script>
        <!-- Page JS Plugins -->
        <script src="<?= base_url() ?>assets/backend/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script>
          function storeToken(token, user_id, user_name, user_role, user_status){
            $.ajax({
              url: "webmember/store_token",
              type: "POST",
              data: {
                token:token,
                user_id:user_id,
                user_name:user_name,
                user_role:user_role,
                user_status:user_status,
              },
              success: function(){
                console.log("Credentials saved!");
              }
            });
          }

          $(document).ready(function(){
            $("#login-form").submit(function(e){
              e.preventDefault();
              $("#alert-box").html('');
              msg = "<div class=\"alert alert-danger alert-dismissable\">\n" +
                  "  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>\n" +
                  "  <span id=\"response_message\"><?= $this->lang->line('notification_login_wrong_username_password') ?></span>\n" +
                  "</div>";
              var username = $("#username").val().trim();
              var password = $("#password").val().trim();
              if( username != "" && password != "" ){
                $.ajax({
                  url: "<?= $this->config->item('backend_server_url') ?>auth/login",
                  type: "POST",
                  data:{auth_username:username,auth_password:password},
                  crossOrigin: true,
                  success:function(response){
                    if(response.token != ''){
                      storeToken(response.token, response.user_id, response.user_name, response.user_role, response.user_status);
                      window.location = "dashboard";
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
