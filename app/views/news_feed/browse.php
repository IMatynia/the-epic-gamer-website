<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/ogp_header.php';
require_once APPROOT . '/views/includes/nav.php';
?>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/news_front_page.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article.css">
</head>

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