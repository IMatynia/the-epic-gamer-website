<?php

class OGPdata extends View
{
    public string $title;
    public string $description;
    public ?string $image;
    public string $type;
    public string $url;
    public string $site_name;

    public function __construct(string $title, string $description, ?string $image = DEFAULT_SITE_IMAGE, $type = "website", $url = URLROOT, $site_name = SITENAME)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->type = $type;
        $this->url = $url;
        $this->site_name = $site_name;
    }

    public function render(): void
    {
        ?>
        <head>
            <meta property="og:title" content="<?php echo $this->title; ?>"/>
            <meta property="og:type" content="<?php echo $this->type; ?>"/>
            <meta property="og:image" content="<?php echo $this->image; ?>"/>
            <meta property="og:url" content="<?php echo $this->url; ?>"/>
            <meta property="og:description" content="<?php echo $this->description; ?>"/>
            <meta property="og:site_name" content="<?php echo $this->site_name ?>"/>
        </head>
        <?php
    }
}
