<?php

function html($tags = HEADCFG)
{
?><!doctype HTML>
<html lang='<?= $tags['lang'] ?>'>
<head>
    <title><?= $tags['title'] ?></title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name='robots' content='Index, follow' />
    <meta name="url" content="<?= route() ?>" />
    <meta name="description" content="<?= $tags['description'] ?>" />
    <meta name="keywords" content="<?= $tags['keywords'] ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:locale" content="<?= $tags['lang'] ?>" />
    <meta property="og:type" content="<?= $tags['type'] ?>" />
    <meta property="og:title" content="<?= $tags['title'] ?>" />
    <meta property="og:description" content="<?= $tags['description'] ?>" />
    <meta property="og:url" content="<?= route() ?>" />
    <meta property="og:site_name" content="<?= $tags['sitename'] ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="<?= route() ?>" />
    <!-- css -->
    <link rel="stylesheet" href="<?= asset('/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/structure.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/template.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/style.css') ?>">
    <!-- Head content -->
<?php
}


function body()
{
?>
    </head>
    <body>
        <!-- Body content -->
        <header class="main__header">
            <div class="between padd05">
                <div class="padd05">
                    <a href="https://github.com/soporte00" target="_blank">Soporte00</a>
                </div>
                <div class="padd05">Menú</div>
            </div>
        </header>
        <main class="main__content">
<?php
}


function close()
{
?>
        <!-- Body end -->
        </main>
        <footer class="main__footer centered back-lowlight padd10">
            <a href="mailto:<?=HEADCFG['supportEmail']?>"> <?=HEADCFG['supportEmail']?> </a>
        </footer>
    </body>
</html>
<?php
}
