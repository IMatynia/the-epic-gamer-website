<head>
    <meta charset="UTF-8">
    <meta htttp-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/shared.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/hax_script.js"></script>
    <?php
    if (isset($data["ogp_data"])) {
        require_once APPROOT . '/views/includes/ogp_header.php';
        $final_title = $data["ogp_data"]->title;
    } else {
        $final_title = SITENAME;
    }

    if (isset($data["page_title"])) {
        $final_title = $data["page_title"];
    }
    echo '<title>' . $final_title . '</title>';
    ?>
</head>