<?php
if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $search))
{
  $search = '';
}
?>
<form id="search_form"
      class=""
      action="<?= $search_action ?>"
      method="post">
    <div class="row">
        <div class="col-sm-12 col-lg-6 mb-3">
            <?php
            if (!isset($search_placeholder)) {
                $search_placeholder = $this->lang->line('label_search');
            }
            ?>
            <input class="form-control" 
                   type="text" 
                   id="search" name="search"
                   placeholder="<?= $search_placeholder ?>"
                   value="<?= $search ?>">
        </div>
        <div class="col-sm-12 col-lg-5 mb-3">
            <?= form_dropdown("search_role", array(), '', 'id="search_role" class="js-select2 form-control" style="width:100%; height:100%"'); ?>
        </div>
        <div class="col-sm-12 col-lg-1 mb-3">
            <button class="btn btn-secondary pull-right" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>