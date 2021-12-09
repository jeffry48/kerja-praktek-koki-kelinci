<?php
if (isset($title_code)) {
    if (!isset($title_code_style)) {
        $title_code_style = "text";
    }
    ?>
    <h4 class="pull-right <?= $title_code_style ?>"><?= $title_code ?></h4>
    <?php
}
?>