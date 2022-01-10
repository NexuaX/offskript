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
                <h2 class="section__title">Movies</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid explorer--grid">
                    <?php foreach ($movies ?? [] as $movie): ?>
                        <a href="/production/<?php echo $movie->getId(); ?>">
                        <div class="flex explorer-grid-item">
                            <img src="/public/img/<?php echo $movie->getImageSrc() ?>" alt="poster" class="explorer-grid-item__poster">
                            <div class="item-details">
                                <h3 class="item-details__title"><?php echo $movie->getTitle() ?></h3>
                                <div class="flex item-stats">
                                    <i class="fas fa-star item-stats__star"></i>
                                    <span class="item-stats__stars-count"><?php echo $movie->getMark() ?></span>
                                    <span class="item-stats__vertical-line">|</span>
                                    <i class="fas fa-heart item-stats__heart"></i>
                                    <span class="item-stats__hearts-count"><?php echo $movie->getHeartsCount() ?></span>
                                </div>
                            </div>
                        </div>
                        </a>
                    <?php endforeach ?>
                </div>

                <h2 class="section__title">Shows</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid explorer--grid">
                    <?php foreach ($shows ?? [] as $show): ?>
                        <div class="flex explorer-grid-item">
                            <img src="/public/img/<?php echo $show->getImageSrc() ?>" alt="poster" class="explorer-grid-item__poster">
                            <div class="item-details">
                                <h3 class="item-details__title"><?php echo $show->getTitle() ?></h3>
                                <div class="flex item-stats">
                                    <i class="fas fa-star item-stats__star"></i>
                                    <span class="item-stats__stars-count"><?php echo $show->getMark() ?></span>
                                    <span class="item-stats__vertical-line">|</span>
                                    <i class="fas fa-heart item-stats__heart"></i>
                                    <span class="item-stats__hearts-count"><?php echo $show->getHeartsCount() ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <h2 class="section__title">Anime</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid explorer--grid">
                    <?php foreach ($animes ?? [] as $anime): ?>
                        <div class="flex explorer-grid-item">
                            <img src="/public/img/<?php echo $anime->getImageSrc() ?>" alt="poster" class="explorer-grid-item__poster">
                            <div class="item-details">
                                <h3 class="item-details__title"><?php echo $anime->getTitle() ?></h3>
                                <div class="flex item-stats">
                                    <i class="fas fa-star item-stats__star"></i>
                                    <span class="item-stats__stars-count"><?php echo $anime->getMark() ?></span>
                                    <span class="item-stats__vertical-line">|</span>
                                    <i class="fas fa-heart item-stats__heart"></i>
                                    <span class="item-stats__hearts-count"><?php echo $anime->getHeartsCount() ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <h2 class="section__title">Games</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid explorer--grid">
                    <?php foreach ($games ?? [] as $game): ?>
                        <div class="flex explorer-grid-item">
                            <img src="/public/img/<?php echo $game->getImageSrc() ?>" alt="poster" class="explorer-grid-item__poster">
                            <div class="item-details">
                                <h3 class="item-details__title"><?php echo $game->getTitle() ?></h3>
                                <div class="flex item-stats">
                                    <i class="fas fa-star item-stats__star"></i>
                                    <span class="item-stats__stars-count"><?php echo $game->getMark() ?></span>
                                    <span class="item-stats__vertical-line">|</span>
                                    <i class="fas fa-heart item-stats__heart"></i>
                                    <span class="item-stats__hearts-count"><?php echo $game->getHeartsCount() ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        </main>

        <?php include "commons/footer.php" ?>

    </div>
</body>
</html>
