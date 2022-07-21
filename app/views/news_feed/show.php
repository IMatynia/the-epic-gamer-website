<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/ogp_header.php';
require_once APPROOT . '/views/includes/nav.php';

$article = $data["article"];
?>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article.css">
</head>

<div class="article">
    <div class="thumbnail">
        <img src="<?php echo $article->thumbnail_image; ?>" />
    </div>

    <h1> <?php echo $article->title; ?> </h1>
    <h2> <?php echo $article->date_published . " | " . $article->author; ?> </h2>
    <p> <?php echo $article->contents; ?> </p>
</div>