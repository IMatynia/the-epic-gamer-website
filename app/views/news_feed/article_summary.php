<?php
if (!isset($article)) {
    throw new Exception("No article provided!");
}
?>

<div class="article_summary">
    <div class="thumbnail">
        <?php echo snug_image($article->thumbnail_image); ?>
    </div>

    <div class="text_summary">
        <div class="title_container">
            <div class="title delicate_shadow"><a href="<?php echo URLROOT . "news/show/" . $article->identifier; ?>"><?php echo $article->title; ?></a></div>
        </div>
        <div class="details"> <?php echo $article->date_published . " | " . $article->author . " | " . join(" / ", $article->tags); ?>
        </div>
        <p> <?php echo $article->text_summary; ?><a href="<?php echo URLROOT . "news/show/" . $article->identifier; ?>"><i> Read more...</i></a> </p>
    </div>
</div>