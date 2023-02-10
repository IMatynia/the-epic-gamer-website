<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/tag_nav.php';
require_once VIEW . 'includes/ads.php';
require_once VIEW . 'includes/footer.php';
require_once VIEW . 'quiz/quiz_summary.php';

class QuizBrowseView extends View
{
    public ?string $category;
    public ?string $cat_description;
    public array $quizes;
    public string $url_destination;
    public array $nav_tags;
    public OGPdata $ogp;

    public function __construct(?string $category, ?string $cat_description, array $quizes, OGPdata $ogp, array $nav_tags, string $url_destination)
    {
        $this->quizes = $quizes;
        $this->category = $category;
        $this->cat_description = $cat_description;
        $this->url_destination = $url_destination;
        $this->nav_tags = $nav_tags;
        $this->ogp = $ogp;
    }

    public function render(): void
    {
        $head = new HeadView($this->ogp);
        $nav = new NavView();
        $tag_nav = new TagNavView($this->url_destination, $this->nav_tags);
        $footer = new FooterView();
        $ads = new AdsView();

        $head->render();
        $nav->render();
        $tag_nav->render();
        ?>
        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/browse_quizes.css">
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/quiz_summary.css">
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/left_bar.css">
        </head>

        <div id="contents">
            <div class="left_bar">
                <div class="welcome">
                    <i>Epic gaming,<br>Epic quiz</i>
                </div>
                <div class="current_section delicate_shadow"><?php if(isset($this->category)) echo strtoupper($this->category) . " &#8658"; ?> </div>
                <div class="description">
                    <?php echo ucfirst($this->cat_description); ?>
                </div>
            </div>
            <div class="quiz_container">
                <?php
                foreach ($this->quizes as $i => $quiz) {
                    $quiz_summary = new QuizSummaryView($quiz);
                    $quiz_summary->render();
                }
                ?>
            </div>
            <?php $ads->render(); ?>
        </div>
        <?php
        $footer->render();
    }
}
