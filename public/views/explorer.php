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
            <form action="">
                <input type="search" class="search-bar" placeholder="Search">
                <div class="grid filters">
                    <p class="filters__title">Filters:</p>
                    <label>
                        <input type="checkbox" class="filters__checkbox" value="movie">
                        Movie
                    </label>
                    <label>
                        <input type="checkbox" class="filters__checkbox" value="show">
                        Show
                    </label>
                    <label>
                        <input type="checkbox" class="filters__checkbox" value="game">
                        Game
                    </label>
                    <label>
                        <input type="checkbox" class="filters__checkbox" value="anime">
                        Anime
                    </label>
                    <div class="advanced-filters-button">Advanced filters</div>
                </div>
            </form>
        </div>

        <main class="grid main">
            <section class="flex section section--explorer">
                <h2 class="section__title">Movies</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid explorer--grid">
                    <div class="flex explorer-grid-item">
                        <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="explorer-grid-item__poster">
                        <div class="item-details">
                            <h3 class="item-details__title">Title1</h3>
                            <div class="flex item-stats">
                                <i class="fas fa-star item-stats__star"></i>
                                <span class="item-stats__stars-count">8.4</span>
                                <span class="item-stats__vertical-line">|</span>
                                <i class="fas fa-heart item-stats__heart"></i>
                                <span class="item-stats__hearts-count">234</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex explorer-grid-item">
                        <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="explorer-grid-item__poster">
                        <div class="item-details">
                            <h3 class="item-details__title">Title2</h3>
                            <div class="flex item-stats">
                                <i class="fas fa-star item-stats__star"></i>
                                <span class="item-stats__stars-count">8.4</span>
                                <span class="item-stats__vertical-line">|</span>
                                <i class="fas fa-heart item-stats__heart"></i>
                                <span class="item-stats__hearts-count">234</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex explorer-grid-item">
                        <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="explorer-grid-item__poster">
                        <div class="item-details">
                            <h3 class="item-details__title">Title3</h3>
                            <div class="flex item-stats">
                                <i class="fas fa-star item-stats__star"></i>
                                <span class="item-stats__stars-count">8.4</span>
                                <span class="item-stats__vertical-line">|</span>
                                <i class="fas fa-heart item-stats__heart"></i>
                                <span class="item-stats__hearts-count">234</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex explorer-grid-item">
                        <img src="/public/img/posters/mandalorian.jpg" alt="poster" class="explorer-grid-item__poster">
                        <div class="item-details">
                            <h3 class="item-details__title">Title4</h3>
                            <div class="flex item-stats">
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

        <?php include "commons/footer.php" ?>

    </div>
</body>
</html>
