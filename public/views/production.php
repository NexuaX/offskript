<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Production</title>
    <?php
        include "commons/links.php";
        include "commons/scripts.php";  ?>
    <link rel="stylesheet" href="/public/css/production.css">

</head>
<body data-navigation-visible="false">
    <?php include "commons/nav.php"; ?>

    <div class="content-wrapper">

        <div class="flex top-content">
            <div class="grid production-container">
                <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="production__poster">
                <div class="production-info">
                    <h2 class="production__title">The Mandalorian</h2>
                    <div class="production-stats">
                        <i class="fas fa-star production-stats__star"></i>
                        <span class="stats__stars-count">8.4</span>
                        <span class="production-stats__vertical-line">|</span>
                        <i class="fas fa-heart production-stats__heart"></i>
                        <span class="production-stats__hearts-count">234</span>
                    </div>
                    <span class="production__type color-show">Show</span>
                    <p class="production__synopsis">Synopsis</p>
                    <p class="production__others">Other details</p>
                </div>
                <div class="grid production-user-panel">
                    <p class="user-panel__headline">Your score:</p>
                    <div class="user-panel-stats-control">
                        <i class="fas fa-star user-panel__star"></i>
                        <span class="user-panel__stars-count">8.4</span>
                        <span class="user-panel__vertical-line">|</span>
                        <i class="fas fa-heart user-panel__heart"></i>
                    </div>
                    <div class="user-panel__button button--blue">
                        Dodaj do obejrzanych
                    </div>
                    <div class="user-panel__button button--blue">
                        Chcę obejrzeć
                    </div>
                    <div class="user-panel__button button--red">
                        Usuń ustawienia <i class="fas fa-times user-panel__times"></i>
                    </div>
                </div>
            </div>
        </div>

        <main class="grid main">

            <section class="flex section section--user-activity">
                <h2 class="section__title">User activity</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid user-activity-grid">
                    <div class="grid user-activity-item">
                        <img src="/public/img/avatars/avatar1.jpg" alt="avatar" class="user-profile">
                        <p class="user-name">User</p>
                        <div class="flex item-stats">
                            <i class="fas fa-star item-stats__star"></i>
                            <span class="item-stats__stars-count">8.4</span>
                        </div>
                    </div>
                    <div class="grid user-activity-item">
                        <img src="/public/img/avatars/avatar1.jpg" alt="avatar" class="user-profile">
                        <p class="user-name">User</p>
                        <div class="flex item-stats">
                            <i class="fas fa-star item-stats__star"></i>
                            <span class="item-stats__stars-count">8.4</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="flex section section--recommendations">
                <h2 class="section__title">Recommendations</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid recommendation-grid">
                    <div class="recommendation-grid-item">
                        <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="recommendation-grid-item__poster">
                        <div class="recommendation-item-details">
                            <h3 class="recommendation-item-details__title">Title</h3>
                            <div class="flex item-stats">
                                <span class="item-details__item-type color-show">Type</span>
                                <i class="fas fa-star item-stats__star"></i>
                                <span class="item-stats__stars-count">8.4</span>
                                <span class="item-stats__vertical-line">|</span>
                                <i class="fas fa-heart item-stats__heart"></i>
                                <span class="item-stats__hearts-count">234</span>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-grid-item">
                        <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="recommendation-grid-item__poster">
                        <div class="recommendation-item-details">
                            <h3 class="recommendation-item-details__title">Title</h3>
                            <div class="flex item-stats">
                                <span class="item-details__item-type color-show">Type</span>
                                <i class="fas fa-star item-stats__star"></i>
                                <span class="item-stats__stars-count">8.4</span>
                                <span class="item-stats__vertical-line">|</span>
                                <i class="fas fa-heart item-stats__heart"></i>
                                <span class="item-stats__hearts-count">234</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <?php include "commons/footer.php"; ?>
    </div>

</body>
</html>