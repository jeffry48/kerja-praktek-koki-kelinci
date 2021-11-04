<?php
if (!(isset($hide_form_navigation) && $hide_form_navigation == true)) {
    if (isset($form_back) && $form_back != "") {
        ?>
        <!--<a href="<?= $form_back ?>" class="btn btn-alt-primary mb-10 mt-10" type="button">
        <?= $this->lang->line('action_back') ?>
        </a>-->
        <?php
    }
    if (isset($form_submit) && $form_submit != "") {
        ?>
        <button id="btn-submit-form" class="btn btn-success mb-10 mt-10" type="submit">
            <?= $form_submit_label ?>
        </button>
        <?php
    }
    if ((isset($form_next) && $form_next != "") && (isset($form_next_label) && $form_next_label != "")) {
        ?>
        <a href="<?= $form_next ?>" class="btn btn-warning mb-10 mt-10" type="button">
            <?= $form_next_label ?>
        </a>
        <?php
    }
}
?>