<div class="content">
    <h1 class="text-center"><?= $this->lang->line('application_themed_title') ?></h1>
    <h5 class="text-center">----------------------------------------</h5>
    <a href="<?= base_url() ?>">
        <h5 class="text-center text-danger">HOME</h5>
    </a>
    <a href="<?= base_url() ?>front/about">
        <h5 class="text-center text">ABOUT</h5>
    </a>
    <a href="<?= base_url() ?>front/news">
        <h5 class="text-center text">NEWS</h5>
    </a>
    <a href="<?= base_url() ?>front/gallery">
        <h5 class="text-center text">GALLERY</h5>
    </a>
    <a href="<?= base_url() ?>front/contact">
        <h5 class="text-center text">CONTACT</h5>
    </a>
    <h5 class="text-center">----------------------------------------</h5>
    <a href="<?= base_url() ?>atlet">
        <h5 class="text-center text-info">WEBMEMBER</h5>
    </a>
    <a href="<?= base_url() ?>tim">
        <h5 class="text-center text-success">ADMIN</h5>
    </a>
    <h5 class="text-center">----------------------------------------</h5>
    <h5 class="text-center">THIS IS <?= $title ?></h5> 
    <!-- $title dilempar dari CONTROLLER -->

</div>