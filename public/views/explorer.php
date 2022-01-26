<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>offskript - explorer</title>
    <?php
        include "commons/links.php";
        include "commons/scripts.php"; ?>
    <link rel="stylesheet" href="/public/css/explorer.css">
    <script src="/public/js/explorer_search.js" defer></script>
</head>
<body data-navigation-visible="false">

    <?php include "commons/nav.php"; ?>

    <div class="content-wrapper">

        <div class="flex top-content">
            <h2 class="top-content__title">Explore your Passion.</h2>

            <?php include "commons/search-form.php" ?>

        </div>

        <main class="grid main">
            <section class="flex section section--explorer">

            </section>
        </main>

        <?php include "commons/footer.php" ?>

    </div>
</body>
</html>

<?php include "commons/loader.php"; ?>

<template id="section-template">
    <div class="section--subsection">
        <h2 class="section__title">sectionTitle</h2>
        <div class="section__horizontal-line"></div>
        <div class="grid explorer--grid">
        </div>
    </div>
</template>

<template id="section-item-template">
    <a href="" class="explorer-grid-item-link">
        <div class="flex explorer-grid-item">
            <img src="" alt="poster" class="explorer-grid-item__poster">
            <div class="item-details">
                <h4 class="item-details__title">title</h4>
                <div class="flex item-stats">
                    <i class="fas fa-star item-stats__star"></i>
                    <span class="item-stats__stars-count">mark</span>
                    <span class="item-stats__vertical-line">|</span>
                    <i class="fas fa-heart item-stats__heart"></i>
                    <span class="item-stats__hearts-count">heartsCount</span>
                </div>
            </div>
        </div>
    </a>
</template>
