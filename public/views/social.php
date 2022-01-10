<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>offscript - social</title>
    <?php
        include "commons/links.php";
        include "commons/scripts.php"; ?>
    <link rel="stylesheet" href="/public/css/social.css">
</head>
<body data-navigation-visible="false">

    <?php include "commons/nav.php"; ?>

    <div class="content-wrapper">

        <div class="flex top-content">
            <h2 class="top-content__title">Explore your Passion.</h2>

            <?php include "commons/search-form.php" ?>

        </div>

        <main class="grid main">

            <section class="flex section section--user-activity">
                <h2 class="section__title">User activity</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid user-activity-grid">
                    <?php foreach (($reviews ?? []) as $review): ?>
                        <div class="flex user-activity-item">
                            <img src="/public/img/<?php echo $review['production_image'] ?>" alt="poster" class="user-activity-item__poster">
                            <div class="grid item-details">
                                <h3 class="item-details__title"><?php echo $review['title'] ?></h3>
                                <span class="item-details__item-type color-<?php echo $review['type'] ?>"><?php echo $review['type'] ?></span>
                                <div class="flex item-stats">
                                    <i class="fas fa-star item-stats__star"></i>
                                    <span class="item-stats__stars-count"><?php echo $review['mark'] ?></span>
                                </div>
                                <div class="flex user-details">
                                    <p class="user-name"><?php echo $review['username'] ?></p>
                                    <p><?php echo $review['review'] ?></p>
                                    <img src="/public/img/<?php echo $review['user_image'] ?>" alt="avatar" class="user-profile">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="flex section section--random-users">
                <h2 class="section__title">Random users</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid random-users-grid">
                    <?php foreach (($randomUsers ?? []) as $randomUser): ?>
                        <div class="flex random-user-item">
                            <img src="/public/img/<?php echo $randomUser['image_src'] ?>" alt="avatar" class="random__user-profile">
                            <div class="grid random-user-details">
                                <p class="random__user-name"><?php echo $randomUser['username'] ?></p>
                                <div class="flex stat-item">
                                    <i class="fas fa-star stat-item__star"></i>
                                    <span class="stat-item__number"><?php echo $randomUser['reviews'] ?></span>
                                </div>
                                <div class="flex stat-item">
                                    <i class="fas fa-user-plus stat-item__user-plus"></i>
                                    <span class="stat-item__number"><?php echo $randomUser['followers'] ?></span>
                                </div>
                                <span class="random-user__vertical-line"></span>
                                <div class="flex stat-item">
                                    <div class="circle color-movie"></div>
                                    <span class="stat-item__number"><?php echo $randomUser['movies'] ?></span>
                                </div>
                                <div class="flex stat-item">
                                    <div class="circle color-show"></div>
                                    <span class="stat-item__number"><?php echo $randomUser['shows'] ?></span>
                                </div>
                                <div class="flex stat-item">
                                    <div class="circle color-game"></div>
                                    <span class="stat-item__number"><?php echo $randomUser['games'] ?></span>
                                </div>
                                <div class="flex stat-item">
                                    <div class="circle color-anime"></div>
                                    <span class="stat-item__number"><?php echo $randomUser['animes'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="flex section section--trending">
                <h2 class="section__title">Trending</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid trending-grid">
                    <?php foreach (($trendingProds ?? []) as $production): ?>
                        <div class="trending-grid-item">
                            <img src="/public/img/<?php echo $production->getImageSrc() ?>" alt="poster" class="trending-grid-item__poster">
                            <div class="trending-item-details">
                                <h3 class="trending-item-details__title"><?php echo $production->getTitle() ?></h3>
                                <div class="flex item-stats">
                                    <span class="item-details__item-type color-<?php echo $production->getType() ?>"><?php echo $production->getType() ?></span>
                                    <i class="fas fa-star item-stats__star"></i>
                                    <span class="item-stats__stars-count"><?php echo $production->getMark() ?></span>
                                    <span class="item-stats__vertical-line">|</span>
                                    <i class="fas fa-heart item-stats__heart"></i>
                                    <span class="item-stats__hearts-count"><?php echo $production->getHeartsCount() ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

        </main>

        <?php include "commons/footer.php"; ?>

    </div>

</body>
</html>