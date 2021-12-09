<?php

if (isset($sub_title) && $sub_title != "") {
    $shown_title = $sub_title;
} else {
    $shown_title = $title;
}
if (isset($title_description) && $title_description != "") {
    $shown_title .= " $title_description";
}
?>
<?= $shown_title ?>