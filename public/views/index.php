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
    <link rel="stylesheet" href="/public/css/index.css">
</head>
<body data-navigation-visible="false">

    <?php include "commons/nav.php"; ?>

    <div class="content-wrapper">

        <div class="flex top-content">
            <h1 class="top-content__title">Discover and Share your Passion.</h1>
            <div class="grid features">
                <div class="grid feature-item">
                    <i class="fas fa-database feature-item__icon"></i>
                    <p class="feature-item__description">Movies, shows, anime and games database</p>
                </div>
                <div class="grid feature-item">
                    <i class="fas fa-user-circle feature-item__icon"></i>
                    <p class="feature-item__description">Create and share your watch lists and profile</p>
                </div>
                <div class="grid feature-item">
                    <i class="fas fa-users feature-item__icon"></i>
                    <p class="feature-item__description">Find other users, browse profiles, seek inspirations</p>
                </div>
                <div class="grid feature-item">
                    <i class="fas fa-newspaper feature-item__icon"></i>
                    <p class="feature-item__description">Browse, receive news on your favorite topics</p>
                </div>
            </div>
        </div>

        <main class="grid main">
            <section class="flex section section--news">
                <h2 class="section__title">Latest news</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid news">
                    <?php
                    if (isset($news)):
                        foreach ($news as $newsitem): ?>
                            <div class="news-item">
                                <img src="/public/img/<?php echo $newsitem->getImageSrc(); ?>" alt="news-item__image" class="news-item__image">
                                <h3 class="news-item__title"><?php echo $newsitem->getTitle(); ?></h3>
                            </div>
                    <?php
                        endforeach;
                    endif; ?>
                </div>
            </section>
            <section class="section section--top-list">
                <div class="grid top-lists">
                    <?php if (isset($topMovies)): ?>
                        <div class="top-list">
                            <h3 class="top-list__title">TOP MOVIES</h3>
                            <div class="grid top-list__body">
                            <?php foreach ($topMovies as $key => $movie): ?>
                                <span class="top-list__number">#<?php echo $key; ?></span>
                                <div class="top-list__data"><?php echo $movie->getTitle(); ?></div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($topShows)): ?>
                        <div class="top-list">
                            <h3 class="top-list__title">TOP SHOWS</h3>
                            <?php foreach ($topShows as $key => $show): ?>
                                <span class="top-list__number">#<?php echo $key; ?></span>
                                <div class="top-list__data"><?php echo $show->getTitle(); ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>

        <?php include "commons/footer.php"; ?>

    </div>
</body>
</html>