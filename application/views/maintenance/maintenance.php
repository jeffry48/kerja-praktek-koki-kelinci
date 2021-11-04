<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title><?= $this->lang->line('application_title') ?></title>

        <meta name="description" web_content="">
        <meta name="author" web_content="">

        <meta name="robots" web_content="noindex, nofollow">
        <meta name="viewport" web_content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?= base_url() ?>images/favicons/favicon.ico">

        <link rel="icon" type="image/png" href="<?= base_url() ?>images/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="<?= base_url() ?>images/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?= base_url() ?>images/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?= base_url() ?>images/favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="<?= base_url() ?>images/favicons/favicon-192x192.png" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>images/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>images/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>images/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>images/favicons/apple-touch-icon-76x76.png">

        <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>images/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>images/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>images/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>images/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>images/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->
        <style>
            body {
                background: <?= $this->config->item('background_color') ?>;
                font-family: Book Antiqua;
            }
            
            .container {
                border-radius: 25px;
                background: #ffffff;
                box-shadow: 0 .3em 1em #000;
                text-align: center;
                text-transform: uppercase;
            }
            
            .centered {
                position: fixed;
                top: 50%;
                left: 50%;
                /* bring your own prefixes */
                transform: translate(-50%, -50%);
            }
            .center-image {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            
            h1, h2, h3, h4 {
                padding: 0px 5px 0px 5px;
            }
        </style>
    </head>
    <body>
        <div class="container centered">
            <h1><?= $this->lang->line('product_name') ?></h1>
            <img class="center-image" src="<?= base_url() ?>images/maintenance_small.png"/>
            <h2><?= $this->lang->line('maintenance_title') ?></h2>
            <h4><?= $this->lang->line('maintenance_message') ?></h4>
            <h4><?= $this->lang->line('maintenance_contact') ?></h4>
        </div>
    </body>
</html>