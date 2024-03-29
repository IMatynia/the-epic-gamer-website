<?php

class HeadView extends View
{
    public ?OGPdata $ogp_data;
    public ?string $page_title;

    public function __construct(?OGPdata $ogp_data = null, ?string $page_title = null)
    {
        $this->ogp_data = $ogp_data;
        $this->page_title = $page_title;
    }

    public function render(): void
    {
        ?>
        <head>
            <meta charset="UTF-8">
            <meta htttp-equiv="Cache-control" content="no-cache">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/shared.css">
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"/>
            <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <link rel="icon" type="image/x-icon" href="<?php echo MEDIA . "favicon.ico" ?>">

            <?php
            if (isset($this->ogp_data)) {
                $this->ogp_data->render();
                $final_title = $this->ogp_data->title . " - " . SITENAME;
            } else {
                $final_title = SITENAME;
            }

            if (isset($this->page_title)) {
                $final_title = $this->page_title . " - " . SITENAME;
            }
            echo '<title>' . $final_title . '</title>';
            ?>
        </head>
        <?php
    }
}

?>
