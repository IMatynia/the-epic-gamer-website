<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/nav.php';
require_once APPROOT . '/views/includes/tag_nav.php';

$article = $data["article"];
?>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/nice_default_tags.css">
</head>

<div class="article_container">
    <?php
        $actual_img = "<img src='" . $article->thumbnail_image . "' />";
        echo snug_image($article->thumbnail_image, ["image"], $actual_img);
    ?>
    <div class="title">
        <?php echo $article->title; ?>
    </div>
    <div class="details">
        <?php echo $article->date_published . " | " . $article->author . " | " . join(" / ", $article->tags); ?>
    </div>
    <div class="contents nice_default_tags">
        <?php echo $article->contents; ?>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>