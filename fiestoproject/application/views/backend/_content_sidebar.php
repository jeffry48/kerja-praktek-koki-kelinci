<?php
/* url management for menu activation */
$main_module = 1;
$sub_module = 2;
$url = array();
$currenturl = get_current_url();
if (isset($currenturl)) {
    $stripedurl = explode('/', $currenturl);
    if (count($stripedurl) < 2) {
        
    } else if (count($stripedurl) == 2) {
        $url[] = $stripedurl[1];
    } else if (count($stripedurl) == 3) {
        $url[] = $stripedurl[1];
        $url[] = $stripedurl[2];
    } else if (count($stripedurl) > 3) {
        $url[] = $stripedurl[1];
        $url[] = $stripedurl[2];
        $url[] = $stripedurl[3];
    }
}
$dashboard_active = "";
$modules = array();
$activity_modules = array();
$show_modules = array();
$open_modules = array();

foreach ($this->lang->line('module_name') as $module_pack) {
    $module_name = $module_pack['name'];
    $activity_modules[$module_name] = array();
    $show_modules[$module_name] = false;
    $open_modules[$module_name] = "";
    if (isset($module_pack['data']) && count($module_pack['data']) > 0) {
        $modules[$module_name] = $module_pack['data'];
        foreach ($modules[$module_name] as $key => $system_module) {
            if (isset($url[$main_module]) && $url[$main_module] == $key) {
                $activity_modules[$module_name][$key] = "active";
                $open_modules[$module_name] = "open";
            } else {
                $activity_modules[$module_name][$key] = "";
            }
            if (!link_restriction("manage_$key")) {
                $show_modules[$module_name] = true; //once TRUE accepted so no need for else FALSE
            }
        }
    }
}

$show_parent_modules = false;
foreach ($show_modules as $show_module) {
    if ($show_module == true) {
        $show_parent_modules = true;
        break;
    }
}

if (isset($url[$main_module]) && $url[$main_module] == "dashboard") {
    $dashboard_active = "active";
} else {
    $dashboard_active = "";
}
?>
<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-primary">A</span><span class="text-dual-primary-dark">M</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout"
                            data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="<?= base_url() ?>dashboard">
                            <?php
                            $logo_name = "logo.svg";
                            if (is_niku()) {
                                $logo_name = "logo_niku.png";
                            } else if (is_club()) {
                                $logo_name = "logo_tim.png";
                            } else if (is_student()) {
                                $logo_name = "logo_atlet.png";
                            } else if (is_committee()) {
                                $logo_name = "logo_panitia.png";
                            }
                            ?>
                            <img src="<?= base_url() ?>images/<?= $logo_name?>">
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-heading" style="opacity:1">
                        <?= "<span class='' style='color:#fff;opacity:1 !important'>" . $session_data['username'] . "</span>"  ?>
                    </li>
                    <?php if ($this->data['session_data']['role'] == 5) { ?>
                        <li>
                            <a class="" href="<?= base_url() ?>profile_student/view/offset/1/id/<?= $session_data['id'] ?> ">
                                <i class="fa fa-user mr-5"></i>&nbsp; <?= $this->lang->line('navigation_profile') ?>
                            </a>
                        </li>
                        <?php //if($this->data['session_data']['student_data']['number_of_invitation'] > 0) {  ?>
                        <li>
                            <a class="" href="<?= base_url() ?>profile_student/invite/offset/1/id/<?= $session_data['id'] ?> ">
                                <i class="fa fa-envelope mr-5"></i>&nbsp; <?= $this->lang->line('navigation_invitation') ?>
                            </a>
                        </li>
                        <li>
                            <a class="" href="<?= base_url() ?>verification_student/verify">
                                <img src="<?= base_url() ?>assets/backend/img/sidebar/icon-verifikasi.svg"> Verifikasi Data
                            </a>
                        </li>
                        <?php //} ?>
                    <?php } else { ?>
                        <li>
                            <a class="" href="<?= base_url() ?>dashboard/update_profile">
                                <i class="fa fa-user mr-5"></i>&nbsp; <?= $this->lang->line('navigation_update_profile') ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a class="" href="<?= base_url() ?>dashboard/change_password">
                            <i class="fa fa-key mr-5"></i>&nbsp; <?= $this->lang->line('navigation_change_password') ?>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?= base_url() ?>dashboard/logout">
                            <i class="si si-logout mr-5"></i>&nbsp; <?= $this->lang->line('navigation_logout') ?>
                        </a>
                    </li>
                    <li>
                        &nbsp;
                    </li>

                    <?php
                    foreach ($this->lang->line('module_name') as $module_pack) {
                        $navigation_name = "navigation_" . $module_pack['title'];
                        $icon_name = $module_pack['icon'];
                        $module_name = $module_pack['name'];
                        $module_activity = "";
                        if (isset($modules[$module_name]) && count($modules[$module_name]) > 0) {
                            $module_data = $modules[$module_name];
                            if ($show_modules[$module_name]) {
                                ?>
                                <li class="<?= $open_modules[$module_name] ?>">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                        <i class="<?= $icon_name ?>"></i>&nbsp;
                                        <span class="sidebar-mini-hide">
                                            <?= $this->lang->line($navigation_name) ?>
                                        </span>
                                    </a>
                                    <ul>
                                        <?php
                                        foreach ($module_data as $key => $single_module) {
                                            if (!link_restriction("manage_" . $key)) {
                                                ?>
                                                <li>
                                                    <a class="<?= $activity_modules[$module_name][$key] ?>"
                                                       href="<?= base_url() . $key ?>">
                                                           <?= $single_module['name'] ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        } else {
                            if (!link_restriction("manage_" . $module_pack['title'])) {
                                $icon = explode(" ", $icon_name);
                                $icon_type = "";
                                if ($icon[0] == "fa" || $icon[0] == "si") {
                                    $icon_type = "icon";
                                }
                                ?>
                                <li>
                                    <a class="<?= $module_activity ?>" href="<?= base_url() . $module_pack['title'] ?>">
                                        <?php
                                        if ($icon_type == "icon") {
                                            ?>
                                            <i class="<?= $icon_name ?>"></i>&nbsp;
                                            <?php
                                        } else {
                                            $image_link = base_url() . "images/icons/$icon_name";
                                            ?>
                                            <img class="image-icon" src="<?= $image_link ?>" alt="<?= $image_link ?>" />
                                            <?php
                                        }
                                        ?>

                                        <span class="sidebar-mini-hide">
                                            <?= $this->lang->line($navigation_name) ?>
                                        </span>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->