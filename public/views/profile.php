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
    <link rel="stylesheet" href="/public/css/profile.css">
</head>
<body data-navigation-visible="false">

<?php include "commons/nav.php"; ?>

<div class="content-wrapper">

    <div class="flex top-content">
        <div class="grid profile-summary">
            <div class="profile-image-wrapper">
                <img src="/public/img/avatars/avatar1.jpg" alt="awatar" class="profile-image">
            </div>
            <div class="user-info">
                <h3 class="user-info__user-name">User</h3>
                <p class="user-info__description">Description</p>
            </div>
            <div class="grid user-stats">
                <div class="flex stat-item">
                    <div class="circle color-movie"></div>
                    <span class="stat-item__number">255 Movies</span>
                </div>
                <div class="flex stat-item">
                    <div class="circle color-show"></div>
                    <span class="stat-item__number">255 Shows</span>
                </div>
                <div class="flex stat-item">
                    <div class="circle color-game"></div>
                    <span class="stat-item__number">255 Games</span>
                </div>
                <div class="flex stat-item">
                    <div class="circle color-anime"></div>
                    <span class="stat-item__number">255 Anime</span>
                </div>
                <span class="user-stats__horizontal-line"></span>
                <div class="flex stat-item">
                    <i class="fas fa-star stat-item__star"></i>
                    <span class="stat-item__number">152 reviews</span>
                </div>
                <div class="flex stat-item">
                    <i class="fas fa-user-plus stat-item__user-plus"></i>
                    <span class="stat-item__number">234 followers</span>
                </div>
            </div>
            <div class="share-profile-button">
                Share profile
            </div>
        </div>

    </div>

    <main class="grid main">
        <section class="flex section section--user-activity">
            <h2 class="section__title">User activity</h2>
            <div class="section__horizontal-line"></div>
            <div class="grid user-activity-grid">
                <div class="flex user-activity-item">
                    <img src="/public/img/posters/avengers.jpg" alt="poster" class="user-activity-item__poster">
                    <div class="grid item-details">
                        <h3 class="item-details__title">Title</h3>
                        <span class="item-details__item-type color-movie">Type</span>
                        <div class="flex item-stats">
                            <i class="fas fa-star item-stats__star"></i>
                            <span class="item-stats__stars-count">8.4</span>
                        </div>
                        <div class="flex user-details">
                            <p class="user-name">User</p>
                            <img src="/public/img/avatars/avatar1.jpg" alt="avatar" class="user-profile">
                        </div>
                    </div>
                </div>
                <div class="flex user-activity-item">
                    <img src="/public/img/posters/avengers.jpg" alt="poster" class="user-activity-item__poster">
                    <div class="grid item-details">
                        <h3 class="item-details__title">Title</h3>
                        <span class="item-details__item-type color-movie">Type</span>
                        <div class="flex item-stats">
                            <i class="fas fa-star item-stats__star"></i>
                            <span class="item-stats__stars-count">8.4</span>
                        </div>
                        <div class="flex user-details">
                            <p class="user-name">User</p>
                            <img src="/public/img/avatars/avatar1.jpg" alt="avatar" class="user-profile">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex section section--random-users">
            <h2 class="section__title">Other users</h2>
            <div class="section__horizontal-line"></div>
            <div class="grid random-users-grid">
                <div class="flex random-user-item">
                    <img src="/public/img/avatars/avatar1.jpg" alt="avatar" class="random__user-profile">
                    <div class="grid random-user-details">
                        <p class="random__user-name">User</p>
                        <div class="flex stat-item">
                            <i class="fas fa-star stat-item__star"></i>
                            <span class="stat-item__number">152</span>
                        </div>
                        <div class="flex stat-item">
                            <i class="fas fa-user-plus stat-item__user-plus"></i>
                            <span class="stat-item__number">234</span>
                        </div>
                        <span class="random-user__vertical-line"></span>
                        <div class="flex stat-item">
                            <div class="circle color-movie"></div>
                            <span class="stat-item__number">255</span>
                        </div>
                        <div class="flex stat-item">
                            <div class="circle color-show"></div>
                            <span class="stat-item__number">255</span>
                        </div>
                        <div class="flex stat-item">
                            <div class="circle color-game"></div>
                            <span class="stat-item__number">255</span>
                        </div>
                        <div class="flex stat-item">
                            <div class="circle color-anime"></div>
                            <span class="stat-item__number">255</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex section section--favorites">
            <h2 class="section__title">Favorites</h2>
            <div class="section__horizontal-line"></div>
            <div class="grid favorite-grid">
                <div class="favorite-grid-item">
                    <img src="/public/img/2206017995.jpg" alt="poster" class="favorite-grid-item__poster">
                    <div class="favorite-item-details">
                        <h3 class="favorite-item-details__title">Name</h3>
                        <p class="favorite-item-details__description">Description</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "commons/footer.php"; ?>

</div>
</body>
</html>