<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/tag_nav.php';

class QuizResultsView extends View
{
    public stdClass $quiz_summary;
    public float $result;
    public string $url_destination;
    public array $nav_tags;
    public OGPdata $ogp;

    public function __construct($quiz_summary, float $result, OGPdata $ogp, array $nav_tags, string $url_destination)
    {
        $this->result = $result;
        $this->quiz_summary = $quiz_summary;
        $this->url_destination = $url_destination;
        $this->nav_tags = $nav_tags;
        $this->ogp = $ogp;
    }

    public function render(): void
    {
        $head = new HeadView($this->ogp);
        $nav = new NavView();
        $tag_nav = new TagNavView($this->url_destination, $this->nav_tags);

        $head->render();
        $nav->render();
        $tag_nav->render();
        ?>
        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/quiz_result.css">
        </head>

        <div class="master_container">
            <div class="side_bar">
                <img src="https://c.tenor.com/NXvU9jbBUGMAAAAC/fireworks.gif"/>
                <img src="https://c.tenor.com/hs6SPZV4Vt8AAAAC/free-smiley-faces-de-emoji.gif"/>
            </div>
            <div class="result">
                <p>Congratulations! You have finished</p>
                <div class="title"><?php echo $this->quiz_summary->title; ?></div>

                <p>Your final score is:</p>
                <?php
                $available = [
                    "terrible_score",
                    "poor_score",
                    "mid_score",
                    "good_score",
                    "perfect_score"
                ];
                $indicator = floor($this->result / (100 / (sizeof($available)-1)));

                $style = "score " . $available[$indicator];
                ?>
                <div class="<?php echo $style; ?>"><?php echo $this->result . "%"; ?></div>
                <div class="gifs">
                    <img src="https://c.tenor.com/iKekUiIToocAAAAC/myhome-50lakhs.gif"/>
                    <img src="https://www.fg-a.com/congrats/congratulations-flowers.gif"/>
                    <img src="https://www.fg-a.com/congrats/congratulations-balloons.gif"/>
                    <img src="https://www.fg-a.com/congrats/congrats-champagne-2018.gif"/>
                </div>
            </div>
            <div class="side_bar">
                <img src="https://c.tenor.com/0CHCuns2ai8AAAAC/happy-diwali-2018.gif"/>
                <img src="https://c.tenor.com/mBvN3LJ0Q5AAAAAC/%D0%B2%D0%B5%D0%BB%D1%8C%D0%B7%D0%B5%D0%B2%D1%83%D0%BB%D0%B3%D0%BE%D0%B2%D0%BD%D0%BE%D0%BF%D0%BE%D0%BD%D0%BE%D1%81-beelzebub.gif"/>
            </div>
        </div>

        <?php
    }
}