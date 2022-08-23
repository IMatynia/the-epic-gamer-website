<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/ogp_header.php';
require_once APPROOT . '/views/includes/nav.php';
require_once APPROOT . '/views/includes/tag_nav.php';
?>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/news_front_page.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article.css">
</head>

<div id="contents">
    <div class="left_bar">
        <div class="welcome">
            Welcome to the most <i>epic</i> website on the internet!
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