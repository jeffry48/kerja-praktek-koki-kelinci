<?php
if (!$forbidden_edit) {
    ?>
    <div class="footer-button text-right">
        <label></label>
        <a href="<?= base_url($module . '/' . 'edit/' . $offset_parameter_buffer . '/' . $advance_parameter_buffer . '/' . $search_parameter_buffer) ?>">
            <img style="height:55px;" src="<?= base_url() ?>/images/icons/icons_edit2.svg">
        </a>
    </div>
    <?php
}
?>