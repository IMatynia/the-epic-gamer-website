<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/tag_nav.php';
require_once VIEW . 'includes/footer.php';


class ShowArticleView extends View
{
    public stdClass $article;
    public string $url_destination;
    public array $nav_tags;
    public OGPdata $ogp;

    public function __construct(stdClass $article, OGPdata $ogp, array $nav_tags, string $url_destination)
    {
        $this->article = $article;
        $this->url_destination = $url_destination;
        $this->nav_tags = $nav_tags;
        $this->ogp = $ogp;
    }

    public
    function render(): void
    {
        $head = new HeadView($this->ogp);
        $nav = new NavView();
        $tag_nav = new TagNavView($this->url_destination, $this->nav_tags);
        $footer = new FooterView();

        $head->render();
        $nav->render();
        $tag_nav->render();

        ?>

        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article.css">
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/nice_default_tags.css">
        </head>

        <div class="article_container">
            <?php
            $actual_img = "<img src='" . ($this->article->thumbnail ?: DEFAULT_SITE_IMAGE) . "' />";
            echo snug_image($this->article->thumbnail, ["image"], $actual_img);
            ?>
            <div class="title">
                <?php echo $this->article->title; ?>
            </div>
            <div class="details">
                <?php echo $this->article->date_published . " | " . $this->article->author . " | " . join(" / ", $this->article->tags); ?>
            </div>
            <div class="contents nice_default_tags">
                <?php echo $this->article->content; ?>
            </div>
        </div>

        <?php $footer->render();
    }
}

?>