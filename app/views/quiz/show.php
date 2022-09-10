<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/nav.php';
?>

<head>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/quiz.css">
</head>

<div class="quiz_container">
    <div class="image">
        <img src="<?php echo $data['quiz_summary']->image ?>" />
    </div>
    <div class="title">
        <p><?php echo $data['quiz_summary']->title ?></p>
    </div>
    <div class="description">
        <p><?php echo $data['quiz_summary']->description ?></p>
    </div>
    <div class="questions">
        <form method="POST" action="<?php echo URLROOT . 'quiz/results' ?>">
            <input type="hidden" name="identifier" value="<?php echo $data['quiz_summary']->identifier; ?>" />
            <input type="hidden" name="importance_sum" value="<?php echo $data['importance_sum']; ?>" />

            <?php
            foreach ($data["quiz_questions"] as $it => $question) {
                $it += 1;
                require APPROOT . '/views/quiz/unit_question.php';
            }
            ?>
            <input type="submit" title="Check your score!" value="Check your score!" />
        </form>
    </div>
</div>