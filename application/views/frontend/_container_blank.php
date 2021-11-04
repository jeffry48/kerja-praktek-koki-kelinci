<html lang="en" class="no-focus">
    <head>
        <?php include_once '_content_meta.php'; ?>
        <?php include_once '_content_css.php'; ?>
    </head>
    <body>
        <div id="page-container" class="">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <?php
                include_once "$view.php";
                ?>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
    </body>
    <?php include_once '_content_js.php'; ?>
</html>