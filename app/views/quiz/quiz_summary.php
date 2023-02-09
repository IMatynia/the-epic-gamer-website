<?php

class QuizSummaryView extends View
{
    public stdClass $quiz;

    public function __construct($quiz)
    {
        $this->quiz = $quiz;
    }

    public function render(): void
    {
        ?>
        <a href="<?php echo URLROOT . 'quiz/show/' . $this->quiz->sname; ?>">
            <div class="quiz_summary">
                <?php echo snug_image($this->quiz->thumbnail, ["thumbnail"]); ?>

                <div class="text_summary">
                    <div class="title">
                        <?php echo $this->quiz->title; ?>
                    </div>
                    <div class="details">
                        <?php echo "| Questions: " . $this->quiz->question_count . " | " . join(" / ", $this->quiz->tags) . " |"; ?>
                    </div>
                </div>
            </div>
        </a>
        <?php
    }
}
