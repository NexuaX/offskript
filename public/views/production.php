<?php $isUserLogged = $isUserLogged ?? false; ?>

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
    <script src="/public/js/production_content_loader.js" defer></script>
    <script src="/public/js/production_user_control.js" defer></script>
</head>
<body data-navigation-visible="false">
    <?php include "commons/nav.php"; ?>

    <div class="content-wrapper">

        <div class="flex top-content">
            <?php if (isset($production)): ?>
                <div class="grid production-container">
                    <img src="/public/img/<?php echo $production->getImageSrc(); ?>" alt="poster" class="production__poster">
                    <div class="production-info">
                        <h2 class="production__title"><?php echo $production->getTitle(); ?></h2>
                        <div class="production-stats">
                            <i class="fas fa-star production-stats__star"></i>
                            <span class="stats__stars-count"><?php echo $production->getMark(); ?></span>
                            <span class="production-stats__vertical-line">|</span>
                            <i class="fas fa-heart production-stats__heart"></i>
                            <span class="production-stats__hearts-count"><?php echo $production->getHeartsCount(); ?></span>
                        </div>
                        <span class="production__type color-<?php echo $production->getType(); ?>"><?php echo $production->getType(); ?></span>
                        <p class="production__synopsis"><?php echo $production->getSynopsis(); ?></p>
                        <p class="production__others">Year produced: <?php echo $production->getDateProduced(); ?></p>
                    </div>
                    <?php if ($isUserLogged): ?>
                        <div class="grid production-user-panel">
                            <?php if (isset($userReview) && $userReview): ?>
                                <?php if ($userReview->isPlanned()): ?>
                                    <p class="user-panel__headline">Planned</p>
                                    <div data-role="no-plan" class="user-panel__button button--blue">
                                        Mark as not planned
                                    </div>
                                    <div data-role="add" class="user-panel__button button--green">
                                        Add to WatchList
                                    </div>
                                <?php else: ?>
                                    <p class="user-panel__headline">Your score:</p>
                                    <div class="user-panel-stats-control">
                                        <i data-selected="<?php echo $userReview->getMark() ? "true" : "false" ?>"
                                           class="fas fa-star user-panel__star"></i>
                                        <span class="user-panel__stars-count"><?php echo $userReview->getMark(); ?></span>
                                        <span data-visible="false" class="user-panel__stars-control">
                                        <?php for ($i = 0; $i < 11; $i++): ?>
                                            <span data-selected="<?php echo $userReview->getMark() == $i ? "true" : "false" ?>"
                                                  data-value="<?php echo $i ?>"
                                                  class="stars-control__number"><?php echo $i ?></span>
                                        <?php endfor; ?>
                                    </span>
                                        <span class="user-panel__vertical-line">|</span>
                                        <i data-selected="<?php echo $userReview->isHeart() ? "true" : "false" ?>"
                                           class="fas fa-heart user-panel__heart"></i>
                                    </div>
                                    <label for="review-area">
                                        Review
                                    </label>
                                    <textarea placeholder="optional" rows="3" cols="25" id="review-area"
                                              class="user-panel__review-area"><?php echo $userReview->getReview(); ?></textarea>

                                    <div data-role="delete" class="user-panel__button button--red">
                                        Delete <i class="fas fa-times user-panel__times"></i>
                                    </div>
                                    <div data-role="save" class="user-panel__button button--green">
                                        Save <i class="fas fa-check-circle user-panel__times"></i>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div data-role="add" class="user-panel__button button--green">
                                    Add to WatchList
                                </div>
                                <div data-role="plan" class="user-panel__button button--blue">
                                    Plan to watch
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <main class="grid main">

            <section class="flex section section--production-entities">
                <div class="grid production-entities-grid">

                </div>
            </section>

            <section class="flex section section--user-activity">
                <h2 class="section__title">User activity</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid user-activity-grid">

                </div>
            </section>

            <section class="flex section section--recommendations">
                <h2 class="section__title">Recommendations</h2>
                <div class="section__horizontal-line"></div>
                <div class="grid recommendation-grid">

                </div>
            </section>

        </main>

        <?php include "commons/footer.php"; ?>
    </div>

</body>
</html>

<?php include "commons/loader.php"; ?>

<template id="production-entity">
    <div class="entity">
        <div class="entity__picture-wrapper">
            <?php if ($isUserLogged): ?>
                <i data-selected="" data-id="" data-type="" class="fas fa-heart entity__favorite"></i>
            <?php endif; ?>
            <img src="" alt="image" class="entity__img">
        </div>
        <p class="entity__name"></p>
        <p class="entity__type"></p>
    </div>
</template>

<template id="user-activity-item">
    <div class="grid user-activity-item">
        <img src="" alt="avatar" class="user-profile">
        <a href=""><p class="user-name"></p></a>
        <div class="flex item-stats">
            <i class="fas fa-star item-stats__star"></i>
            <span class="item-stats__stars-count"></span>
            <span class="item-stats__vertical-line">|</span>
            <i data-selected="" class="fas fa-heart item-stats__heart"></i>
        </div>
        <p class="user-review"></p>
    </div>
</template>

<template id="recommendation-grid-item">
    <a href="" class="recommendation-grid-item__link">
        <div class="recommendation-grid-item">
            <img src="" alt="poster" class="recommendation-grid-item__poster">
            <div class="recommendation-item-details">
                <h3 class="recommendation-item-details__title"></h3>
                <div class="flex item-stats">
                    <span class="item-details__item-type"></span>
                    <i class="fas fa-star item-stats__star"></i>
                    <span class="item-stats__stars-count"></span>
                    <span class="item-stats__vertical-line">|</span>
                    <i class="fas fa-heart item-stats__heart"></i>
                    <span class="item-stats__hearts-count"></span>
                </div>
            </div>
        </div>
    </a>
</template>
