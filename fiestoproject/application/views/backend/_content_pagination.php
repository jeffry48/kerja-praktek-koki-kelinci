<?php
if (isset($pagination) && strlen($pagination) > 0) {
    ?>
    <div class="row justify-content-center align-items-center">
        <?= $pagination ?>
    </div>
    <?php
}
?>