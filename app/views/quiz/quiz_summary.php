<?php
if (!isset($quiz)) {
    throw new Exception("No article provided!");
}
?>
<a href="<?php echo URLROOT . 'quiz/show/' . $quiz->identifier; ?>">
<div class="quiz_summary">
    <?php echo snug_image($quiz->image, ["thumbnail"]); ?>

    <div class="text_summary">
        <div class="title">
            <?php echo $quiz->title; ?>
        </div>
        <div class="details">
            <?php echo "| Questions: " . $quiz->question_count . " | " . $quiz->category . " |"; ?>
        </div>
    </div>
</div>
</a>