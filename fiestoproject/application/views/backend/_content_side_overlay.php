<!-- Side Overlay-->
<aside id="side-overlay">
    <!-- Side Overlay Scroll Container -->
    <div id="side-overlay-scroll">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow">
            <div class="content-header-section align-parent">
                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Side Overlay -->

                <!-- User Info -->
                <div class="content-header-item"></div>
                <!-- END User Info -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <!-- Profile -->
            <div class="block">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-white">
                        <i class="si si-wrench font-size-default mr-10"></i><?= $this->lang->line('navigation_maintenance_mode') ?>
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row ">
                        <div class="col-sm-12">
                            <?php
                            if ($maintenance_setting == 0) {
                                $maintenance_mode = $this->lang->line('on');
                                $maintenance_style = "btn-primary";
                                $maintenance_mode_condition = $this->lang->line('information_maintenance_mode_off');
                            } else {
                                $maintenance_mode = $this->lang->line('off');
                                $maintenance_style = "btn-danger";
                                $maintenance_mode_condition = $this->lang->line('information_maintenance_mode_on');
                            }
                            ?>
                            <div class="row">
                                <p>
                                    <span class="font-w600"><?= $maintenance_mode_condition ?></span>
                                </p>
                            </div>
                            <div class="row mb-10">
                                <a href="<?= base_url() ?>dashboard/maintenance_mode" class="btn <?= $maintenance_style ?>" data-toggle="click-ripple"><?= $this->lang->line('action_maintenance_mode') . " $maintenance_mode" ?></a>
                            </div>
                            <div class="row">
                                <p>
                                    <span class="font-w600 text-danger"><?= $this->lang->line('information_maintenance_mode') ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Profile -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Side Overlay Scroll Container -->
</aside>
<!-- END Side Overlay -->