<?php require APPROOT . '/views/includes/nav.php'; ?>

<div id="contents">
    <div class="article_container">
        <?php
            foreach ($data["articles"] as $identifier => $article) {
                require APPROOT . '/views/news_feed/article_summary.php';
            }
        ?>
    </div>
</div>
    
<?php require APPROOT . '/views/includes/footer.php'; ?>