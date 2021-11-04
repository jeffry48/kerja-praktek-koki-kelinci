<?php
if(!isset($search_placeholder)) {
    $search_placeholder = $this->lang->line('label_search');
}
?>
<form class="block-search"
      action="<?= $search_action ?>"
      method="post">
    <div class="input-group mb-3">
        <input class="form-control" 
               type="text" 
               id="search" name="search" 
               placeholder="<?= $search_placeholder ?>"
               value="<?= $search == '~' ? '' : $saerch ?>">
        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>