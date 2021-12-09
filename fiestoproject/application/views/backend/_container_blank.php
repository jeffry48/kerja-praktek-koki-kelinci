<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <?php include '_content_meta.php'; ?>
        <?php include '_content_css_basic.php'; ?>
    </head>
    <body>
        <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed sidebar-inverse">
            <?php include '_content_side_overlay.php'; ?>
            <?php include '_content_sidebar.php'; ?>
            <?php include '_content_header.php'; ?>

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="content-heading">
                        <?php
                        include_once '_content_form_title.php';
                        ?>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <?php
                            include_once "$view.php";
                            ?>
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
        <?php include '_content_modal_basic.php'; ?>
    </body>
</html>