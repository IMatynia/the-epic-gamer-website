<?php require_once APPROOT . '/views/includes/head.php'; ?>
<?php $article = $data["article"] ?>

<?php
// OGP header
$ogp_data = [
    "title" => $article->title,
    "description" => $article->text_summary,
    "type" => "article",
    "image" => $article->thumbnail_image
];
require_once APPROOT . '/views/includes/ogp_header.php';
?>
<?php require_once APPROOT . '/views/includes/nav.php'; ?>

<div class="article">
    <div class="thumbnail">
        <img src="<?php echo $article->thumbnail_image; ?>" />
    </div>

    <h1> <?php echo $article->title; ?> </h1>
    <h2> <?php echo $article->date_published . " | " . $article->author; ?> </h2>
    <p> <?php echo $article->contents; ?> </p>
</div>