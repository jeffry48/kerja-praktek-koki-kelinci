<?php
if ($message != null || $message != "") {
    ?>
    <div class="alert alert-<?= $notification ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $message ?>
    </div>
    <?php
}
?>