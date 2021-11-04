<?php
$is_maintenance = FALSE;
if ($is_maintenance) {
    require_once "index_maintenance.php";
} else {
    require_once "index_app.php";
}