<?php require_once APPROOT . '/views/includes/head.php'; ?>
<?php require_once APPROOT . '/views/includes/nav.php'; ?>

<div id="contents">
    <div class="left_bar">LEFT BAR</div>
    <div class="article_container">
        <?php
            foreach ($data["articles"] as $identifier => $article) {
                require APPROOT . '/views/news_feed/article_summary.php';
            }
        ?>
    </div>
    <?php require APPROOT . '/views/includes/ads.php'; ?>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>