<?php 
    if(!isset($article))
    {
        throw new Exception("No article provided!");
    }
?>

<div class="article_summary">
    <div class="thumbnail">
        <img src="<?php echo $article->thumbnail_image; ?>" />
    </div>

    <div class="text_summary">
        <h1><a href="<?php echo URLROOT . "news/show/" . $identifier; ?>"><?php echo $article->title; ?></a></h1>
        <h2> <?php echo $article->date_published . " | " . $article->author . " | " . join(" / ", $article->tags); ?> </h2>
        <p> <?php echo $article->text_summary; ?> </p>
    </div>
</div>