<nav class="breadcrumb bg-body-light mb-0">
    <?php
    if (isset($parent_title) && $parent_title != "" && $parent_title != $title) {
        ?>
        <span class="breadcrumb-item"><?= $parent_title ?></span>
        <?php
    }
    if (isset($title) && $title != "") {
        if (isset($breadcrumb_href) && $breadcrumb_href != "") {
            $href = $breadcrumb_href;
        } else {
            $href = base_url() . $module;
        }
        ?>
        <a class="breadcrumb-item" href="<?= $href ?>"><?= $title ?></a>
        <?php
    }
    if (isset($sub_title) && $sub_title != "" && $sub_title != $title) {
        ?>
        <span class="breadcrumb-item active"><?= $sub_title ?></span>
        <?php
    }
    ?>
</nav>