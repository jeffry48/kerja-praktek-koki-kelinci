<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <?php
        include_once '_content_meta.php';
        include_once '_content_css_basic.php';
        ?>
        <style>
            .table-striped tbody tr:nth-of-type(odd) {
                background-color: #f6f6f6;
            }
            .table{border:0;}
            .table th {border:0;}
            .table td {
                border: 0;
                font-weight: 500;
                vertical-align:middle;
            }
            .table-striped tbody tr:nth-of-type(even) {
                background-color: transparent;
            }
            .content-heading{padding-bottom:10px;padding-top:10px;}
        </style>
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
                    <?php include_once '_content_breadcrumbs.php'; ?>

                    <div class="content-heading">

                        <?php
                        echo "<div class='left-side'>";
                        include_once '_content_form_title.php';
                        if ((isset($use_custom_filter) && $use_custom_filter)) {
                            include_once '_content_form_filter.php';
                        }
                        if ((isset($use_custom_sort) && $use_custom_sort)) {
                            include_once '_content_form_sort.php';
                        }
                        echo "</div>";
                        include_once '_content_form_add_new.php';
                        ?>
                    </div>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <?php
                            if (!(isset($hide_form_search) && $hide_form_search)) {
                                include_once '_content_form_search.php';
                            }
                            include_once '_content_form_message.php';
                            include_once "$view.php";
                            include_once '_content_form_navigation.php';
                            ?>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <?php
        include_once '_content_js_basic.php';
        if (isset($use_custom_js_module) && $use_custom_js_module) {
          include_once $use_custom_js_module.'_custom_js.php';
        } else {
          include_once '_default_list_js.php';
        }
        include_once '_content_modal_basic.php';
        ?>
    </body>
</html>