<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <?php include_once '_content_meta.php'; ?>
        <?php include_once '_content_css_basic.php'; ?>
    </head>
    <body>
        <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed sidebar-inverse">
            <?php include_once '_content_side_overlay.php'; ?>
            <?php include_once '_content_sidebar.php'; ?>
            <?php include_once '_content_header.php'; ?>

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <?php
                    include_once "$view.php";
                    ?>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Page JS Code -->
        <?php include_once '_content_js_basic.php'; ?>
        <?php include_once '_content_modal_basic.php'; ?>
    </body>
</html>