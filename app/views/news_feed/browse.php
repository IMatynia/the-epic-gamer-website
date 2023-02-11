<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/tag_nav.php';
require_once VIEW . 'includes/ads.php';
require_once VIEW . 'includes/footer.php';
require_once VIEW . 'news_feed/article_summary.php';

class NewsBrowseView extends View
{
    public ?string $tag;
    public ?string $tag_desc;
    public array $articles;
    public ?array $ads;
    public string $url_destination;
    public array $nav_tags;
    public OGPdata $ogp;

    public function __construct(?string $tag, ?string $tag_desc, array $articles, ?array $ads, OGPdata $ogp, array $nav_tags, string $url_destination)
    {
        $this->tag = $tag;
        $this->tag_desc = $tag_desc;
        $this->articles = $articles;
        $this->ads = $ads;
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
        $ads = new AdsView($this->ads);
        $footer = new FooterView();

        $head->render();
        $nav->render();
        $tag_nav->render();

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
                <div class="current_section delicate_shadow"><?php if (isset($this->tag)) echo strtoupper($this->tag) . " &#8658"; ?> </div>
                <div class="description">
                    <?php echo ucfirst($this->tag_desc); ?>
                </div>
            </div>
            <div class="article_container">
                <?php
                foreach ($this->articles as $i => $article) {
                    $summary = new ArticleSummaryView($article);
                    $summary->render();
                }
                ?>
            </div>
            <?php $ads->render(); ?>
        </div>

        <?php $footer->render();
    }
}
