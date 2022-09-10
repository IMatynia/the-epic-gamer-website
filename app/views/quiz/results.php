<?php
require_once APPROOT . '/views/includes/head.php';
require_once APPROOT . '/views/includes/nav.php';
?>

<H1>
    Congratulations, you have finnished
    <i><?php echo $data["quiz_summary"]->title; ?></i><br>
    Your score: <b><?php echo $data["result"] . "%"; ?></b>
</H1>