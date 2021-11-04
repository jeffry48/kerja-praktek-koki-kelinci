<?php
if (isset($form_invite) && $form_invite != "") {
    ?>
    <a href="<?= $form_invite ?>"
       class="mr-10"
       title="<?= $this->lang->line('label_invite') ?>"
       type="submit">
      <img style="width:55px;" src="<?= base_url() ?>/images/icons/icons_plus.svg">
    </a>
    <?php
}
if (!link_restriction("add_$module") && isset($form_add) && $form_add != "") {
    ?>
    <a href="<?= $form_add ?>"
       class=""
       title="<?= $this->lang->line('label_add') ?>"
       type="submit">
        <img style="width:55px;" src="<?= base_url() ?>/images/icons/icons_plus.svg">
    </a>
    <?php
}
?>