<?php require APPROOT . '/views/includes/nav.php'; ?>

<?php $article = $data["article"] ?>

<div class="article">
    <div class="thumbnail">
        <img src="<?php echo $article->thumbnail_image; ?>" />
    </div>

    <h1> <?php echo $article->title; ?> </h1>
    <h2> <?php echo $article->date_published . " | " . $article->author; ?> </h2>
    <p> <?php echo $article->contents; ?> </p>
</div>