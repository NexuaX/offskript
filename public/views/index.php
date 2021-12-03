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
                    <div class="news-item">
                        <img src="/public/img/news-images/news1.jpg" alt="news-item__image" class="news-item__image">
                        <h3 class="news-item__title">Second life for a director!</h3>
                    </div>
                    <div class="news-item">
                        <img src="/public/img/news-images/news2.jpg" alt="news-item__image" class="news-item__image">
                        <h3 class="news-item__title">Cartoons are getting more popular</h3>
                    </div>
                    <div class="news-item">
                        <img src="/public/img/news-images/news3.jpg" alt="news-item__image" class="news-item__image">
                        <h3 class="news-item__title">Watch anime about art</h3>
                    </div>
                    <div class="news-item">
                        <img src="/public/img/news-images/news_placeholder.jpeg" alt="news-item__image" class="news-item__image">
                        <h3 class="news-item__title">Placeholder</h3>
                    </div>
                </div>
            </section>
            <section class="section section--top-list">
                <div class="grid top-lists">
                    <div class="top-list">
                        <h3 class="top-list__title">TOP MOVIES</h3>
                        <div class="grid top-list__body">
                            <span class="top-list__number">#1</span>
                            <div class="top-list__data">Movie Title</div>
                            <span class="top-list__number">#2</span>
                            <div class="top-list__data">Movie Title</div>
                            <span class="top-list__number">#3</span>
                            <div class="top-list__data">Movie Title</div>
                            <span class="top-list__number">#4</span>
                            <div class="top-list__data">Movie Title</div>
                            <span class="top-list__number">#5</span>
                            <div class="top-list__data">Movie Title</div>
                        </div>
                    </div>
                    <div class="top-list">
                        <h3 class="top-list__title">TOP SHOWS</h3>
                        <div class="grid top-list__body">
                            <span class="top-list__number">#1</span>
                            <div class="top-list__data">Show Title</div>
                            <span class="top-list__number">#2</span>
                            <div class="top-list__data">Show Title</div>
                            <span class="top-list__number">#3</span>
                            <div class="top-list__data">Show Title</div>
                            <span class="top-list__number">#4</span>
                            <div class="top-list__data">Show Title</div>
                            <span class="top-list__number">#5</span>
                            <div class="top-list__data">Show Title</div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include "commons/footer.php"; ?>

    </div>
</body>
</html>