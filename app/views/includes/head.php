<head>
    <meta charset="UTF-8">
    <meta htttp-equiv="Cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/shared.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/article.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/news_front_page.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hax.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/hax_script.js"></script>
    <title><?php if(isset($data["title"])) {echo $data["title"];} else {echo SITENAME;} ?></title>
</head>
