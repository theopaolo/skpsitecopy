<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKP - <?= $page->title() ?> </title>
     <meta content="<?= $site->seodescription() ?>" name="description">

    <meta content="<?php foreach ($site->seoTags()->split() as $keyword): ?><?= $keyword ?>, <?php endforeach ?>" name="keywords">

    <meta content="<?= $site->seotitle() ?>" property="og:title">
    <meta content="website" property="og:type">
    <meta content="<?= $site->title() ?>" property="og:site_name">
    <meta content="<?= $site->url() ?>" property="og:url">
    <meta content="<?php if($site->seoimage()->isNotEmpty()): ?> <?= $site->seoimage()->toFile()->url() ?> <?php endif ?>" property="og:image">
    <meta content="<?= $site->seodescription() ?>" property="og:description">
    <meta content="fr_FR" property="og:locale">

    <meta content="<?= $site->title() ?>" name="twitter:title">
    <meta content="large_summary" name="twitter:card">
    <meta content="<?= $site->socialtwitterURL() ?>" name="twitter:site">
    <meta content="" name="twitter:creator">
    <meta content="<?php if($site->seoimage()->isNotEmpty()): ?> <?= $site->seoimage()->toFile()->url() ?> <?php endif ?>" name="twitter:image">
    <meta content="<?= $site->url() ?>" name="twitter:url">
    <meta content="<?= $site->seodescription() ?>" name="twitter:description">

    <?= css('assets/css/main.css') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <?= js('assets/libs/InertiaPlugin.min.js') ?>
    <link rel="shortcut icon" type="image/jpg" href="assets/favicon/favicon-32x32.png"/>
    <script defer data-domain="saffronkitchenproject.org" src="https://plausible.io/js/plausible.js"></script>
</head>