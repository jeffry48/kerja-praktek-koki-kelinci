<?php
$role = get_active_role();
$username_style = "text-black";
$role_style = "text-white";
if ($role == 2) {
    $page_header_style = "bg-gd-sea";
} else if ($role == 3) {
    $page_header_style = "bg-gd-cherry";
} else if ($role == 4) {
    $page_header_style = "bg-gd-dusk";
} else if ($role == 5) {
    $page_header_style = "bg-gd-leaf";
} else if ($role == 6) {
    $page_header_style = "bg-gd-emerald";
} else {
    $page_header_style = "";
    $role_style = "text-danger";
}
$this->load->library('user_agent');
?>
<!-- Header -->
<header id="page-header" class="<?= $page_header_style ?>">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <a href="javascript:window.history.go(-1);"><svg height="32" class="octicon octicon-chevron-left" viewBox="0 0 8 16" version="1.1" width="16" aria-hidden="true"><path fill-rule="evenodd" d="M5.5 3L7 4.5 3.25 8 7 11.5 5.5 13l-5-5 5-5z"></path></svg></a>
            <?php
            if ($this->session->flashdata('form_back') != "" && current_url() != $this->session->flashdata('form_back')) {
                ?>
                <!--<a href="<?= $this->session->flashdata('form_back') ?>"><svg height="32" class="octicon octicon-chevron-left" viewBox="0 0 8 16" version="1.1" width="16" aria-hidden="true"><path fill-rule="evenodd" d="M5.5 3L7 4.5 3.25 8 7 11.5 5.5 13l-5-5 5-5z"></path></svg></a>-->
                <?php
            } else if (isset($form_back) && $form_back != "") {
                ?>
                <!--<a href="<?= $form_back ?>"><svg height="32" class="octicon octicon-chevron-left" viewBox="0 0 8 16" version="1.1" width="16" aria-hidden="true"><path fill-rule="evenodd" d="M5.5 3L7 4.5 3.25 8 7 11.5 5.5 13l-5-5 5-5z"></path></svg></a>-->
                <?php
            } else {
                ?>
                <!--<a href="<?= $this->agent->referrer(); ?>"><svg height="32" class="octicon octicon-chevron-left" viewBox="0 0 8 16" version="1.1" width="16" aria-hidden="true"><path fill-rule="evenodd" d="M5.5 3L7 4.5 3.25 8 7 11.5 5.5 13l-5-5 5-5z"></path></svg></a>-->
                <?php
            }
            ?>
            <h1 class="page-header">
                <?php
                include_once '_content_form_title.php';
                ?>
            </h1>
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Left Section -->

    </div>
    <!-- END Header Content -->
    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->