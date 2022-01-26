<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>offskript - home</title>
    <?php
    include "commons/links.php";
    include "commons/scripts.php"; ?>
    <script src="/public/js/toplist_loader.js" defer></script>
    <script src="/public/js/profile_content_loader.js" defer></script>
    <link rel="stylesheet" href="/public/css/profile.css">
</head>
<body data-navigation-visible="false">

<?php include "commons/nav.php"; ?>

<div class="content-wrapper">

    <div class="flex top-content">
        <?php if (isset($user, $userStats)): ?>
            <div class="grid profile-summary">
                <div class="profile-image-wrapper">
                    <img src="/public/img/<?php echo $user->getImageSrc(); ?>" alt="avatar" class="profile-image">
                </div>
                <div class="user-info">
                    <h3 class="user-info__user-name"><?php echo $user->getUsername(); ?></h3>
                    <p class="user-info__description"><?php echo $user->getDescription(); ?></p>
                </div>
                <div class="grid user-stats">
                    <?php foreach ($userStats["prodStats"] as $type => $userStat): ?>
                        <div class="flex stat-item">
                            <div class="circle color-<?php echo substr($type, 0, -1) ?>"></div>
                            <span class="stat-item__number"><?php echo $userStat . " " . $type; ?></span>
                        </div>
                    <?php endforeach; ?>
                    <span class="user-stats__horizontal-line"></span>
                    <div class="flex stat-item">
                        <i class="fas fa-star stat-item__star"></i>
                        <span class="stat-item__number"><?php echo $userStats["reviews"]; ?> reviews</span>
                    </div>
                    <div class="flex stat-item">
                        <i class="fas fa-user-plus stat-item__user-plus"></i>
                        <span class="stat-item__number"><?php echo $userStats["followers"]; ?> followers</span>
                    </div>
                </div>
                <div class="share-profile-button">
                    Share profile
                </div>
            </div>
        <?php endif; ?>

    </div>

    <main class="grid main">
        <section class="flex section section--user-activity">
            <h2 class="section__title">User activity</h2>
            <div class="section__horizontal-line"></div>
            <div class="grid user-activity-grid">

            </div>
        </section>

        <section class="flex section section--random-users">
            <h2 class="section__title">Other users</h2>
            <div class="section__horizontal-line"></div>
            <div class="grid random-users-grid">

            </div>
        </section>

        <section class="flex section section--favorites">
            <h2 class="section__title">Favorites</h2>
            <div class="section__horizontal-line"></div>
            <div class="grid favorite-grid">

            </div>
        </section>

        <section class="section section--top-list">
            <div class="grid top-lists">

            </div>
        </section>
    </main>

    <?php include "commons/footer.php"; ?>

</div>
</body>
</html>

<?php include "commons/loader.php"; ?>

<template id="user-activity-item">
    <div class="flex user-activity-item">
        <img src="" alt="poster" class="user-activity-item__poster">
        <div class="grid item-details">
            <h3 class="item-details__title"></h3>
            <span class="item-details__item-type"></span>
            <div class="flex item-stats">
                <i class="fas fa-star item-stats__star"></i>
                <span class="item-stats__stars-count"></span>
            </div>
            <p class="item-details__user-review"></p>
        </div>
    </div>
</template>

<template id="random-user-item">
    <div class="flex random-user-item">
        <img src="" alt="avatar" class="random__user-profile">
        <div class="grid random-user-details">
            <p class="random__user-name"></p>
            <div class="flex stat-item">
                <i class="fas fa-star stat-item__star"></i>
                <span class="stat-item__number random__stars-count"></span>
            </div>
            <div class="flex stat-item">
                <i class="fas fa-user-plus stat-item__user-plus"></i>
                <span class="stat-item__number random__followers-count"></span>
            </div>
            <span class="random-user__vertical-line"></span>
            <div class="flex stat-item">
                <div class="circle color-movie"></div>
                <span class="stat-item__number random__movies-count"></span>
            </div>
            <div class="flex stat-item">
                <div class="circle color-show"></div>
                <span class="stat-item__number random__shows-count"></span>
            </div>
            <div class="flex stat-item">
                <div class="circle color-game"></div>
                <span class="stat-item__number random__games-count"></span>
            </div>
            <div class="flex stat-item">
                <div class="circle color-anime"></div>
                <span class="stat-item__number random__animes-count"></span>
            </div>
        </div>
    </div>
</template>

<template id="favorite-item">
    <div class="favorite-grid-item">
        <img src="" alt="poster" class="favorite-grid-item__poster">
        <div class="favorite-item-details">
            <h3 class="favorite-item-details__title"></h3>
            <p class="favorite-item-details__description"></p>
        </div>
    </div>
</template>

<template id="top-list">
    <div class="top-list">
        <h3 class="top-list__title"></h3>
        <div class="grid top-list__body">

        </div>
    </div>
</template>

<template id="top-list-item">
    <a href="" class="grid top-list-link">
        <span class="top-list__number"></span>
        <div class="top-list__data"></div>
        <div class="top-list-stat">
            <i class="fas fa-star top-list__star"></i>
            <span class="top-list__stars-count"></span>
        </div>
    </a>
</template>
