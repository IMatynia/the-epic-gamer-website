<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/nav.php';
require_once APPROOT . '/views/includes/tag_nav.php';
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
        <div class="current_section delicate_shadow"><?php if(isset($data["category"])) echo strtoupper($data["category"]) . " &#8658"; ?> </div>
    </div>
    <div class="quiz_container">
        <?php
        foreach ($data["quizes"] as $i => $quiz) {
            require APPROOT . '/views/quiz/quiz_summary.php';
        }
        ?>
    </div>
    <?php require APPROOT . '/views/includes/ads.php'; ?>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>