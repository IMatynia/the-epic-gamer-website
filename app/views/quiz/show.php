<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/tag_nav.php';
require_once VIEW . 'includes/footer.php';
require_once VIEW . 'quiz/unit_question.php';

class QuizShowView extends View
{
    public array $questions;
    public stdClass $quiz_summary;
    public float $importance_sum;
    public string $url_destination;
    public array $nav_tags;
    public OGPdata $ogp;

    public function __construct(stdClass $quiz_summary, array $questions, float $importance_sum, OGPdata $ogp, array $nav_tags, string $url_destination)
    {
        $this->questions = $questions;
        $this->quiz_summary = $quiz_summary;
        $this->importance_sum = $importance_sum;
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

        $head->render();
        $nav->render();
        $tag_nav->render();
        ?>

        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/quiz.css">
        </head>

        <div class="quiz_container">
            <?php
            $actual_img = "<img src='" . ($this->quiz_summary->thumbnail ?: DEFAULT_SITE_IMAGE) . "' />";
            echo snug_image($this->quiz_summary->thumbnail, ["image"], $actual_img);
            ?>
            <div class="title">
                <p><?php echo $this->quiz_summary->title ?></p>
            </div>
            <div class="description">
                <?php echo $this->quiz_summary->description ?>
            </div>
            <form class="questions" method="POST" action="<?php echo URLROOT . 'quiz/results' ?>">
                <input type="hidden" name="identifier" value="<?php echo $this->quiz_summary->sname; ?>"/>
                <input type="hidden" name="importance_sum" value="<?php echo $this->importance_sum; ?>"/>

                <?php
                foreach ($this->questions as $it => $question) {
                    $it += 1;
                    $unit = new UnitQuestionView($it, $question);
                    $unit->render();
                }
                ?>
                <input id="submit_button" type="submit" title="Check your score!" value="Check your score!"/>
            </form>

        </div>

        <?php
        $footer->render();
    }
}
