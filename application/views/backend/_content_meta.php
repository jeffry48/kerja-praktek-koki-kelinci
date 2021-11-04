<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<?php
if (isset($override_title) && $override_title != "") {
    $application_title = $override_title;
} else {
    if (is_niku()) {
        $application_title = $this->lang->line('application_title_niku');
    } else if (is_club()) {
        $application_title = $this->lang->line('application_title_tim');
    } else if (is_student()) {
        $application_title = $this->lang->line('application_title_atlet');
    } else if (is_committee()) {
        $application_title = $this->lang->line('application_title_panitia');
    } else {
        $application_title = $this->lang->line('application_title');
    }
}
?>
<title><?= $application_title ?></title>

<meta name="description" content="<?= $this->lang->line('application_title') ?>">
<meta name="author" content="<?= $this->lang->line('developer_company') ?>">
<meta name="robots" content="noindex, nofollow">

<!-- Open Graph Meta -->
<meta property="og:title" content="<?= $this->lang->line('application_title') ?>">
<meta property="og:site_name" content="<?= $this->lang->line('application_title') ?>">
<meta property="og:description" content="<?= $this->lang->line('application_title') ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:image" content="">