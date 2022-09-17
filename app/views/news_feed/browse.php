<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/nav.php';
require_once APPROOT . '/views/includes/tag_nav.php';
?>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/browse_news.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article_summary.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/left_bar.css">
</head>

<div id="contents">
    <div class="left_bar">
        <div class="welcome">
            <i>Epic gaming,<br>Epic news</i>
        </div>
        <div class="current_section delicate_shadow"><?php if(isset($data["tag"])) echo strtoupper($data["tag"]) . " &#8658"; ?> </div>
        <div class="description">
            <?php echo ucfirst($data["tag_desc"]); ?>
        </div>
    </div>
    <div class="article_container">
        <?php
        foreach ($data["articles"] as $i => $article) {
            require APPROOT . '/views/news_feed/article_summary.php';
        }
        ?>
    </div>
    <?php require APPROOT . '/views/includes/ads.php'; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>