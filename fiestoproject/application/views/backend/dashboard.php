<style>
    .content-heading,.page-heading {
        display: none !important;
    }
    @media (min-width: 768px){
        .content {
            margin: 0 auto;
            padding: 0;
            width: 100%;
            overflow-x: visible;
        }
    }
    @media (max-width: 767px){
        .content {
            padding: 0;
        }
    }
</style>
<?php
if (is_superadmin() || is_supervisor()) {
    ?>
    <div class="home-title">
        <h2>Welcome, <?= $username ?>!</h2>
    </div>
    <?php
}
?>