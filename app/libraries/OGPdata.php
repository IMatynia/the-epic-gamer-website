<?php

class OGPdata
{
    public $title;
    public $description;
    public $image;
    public $type;
    public $url;
    public $site_name;

    public function __construct($title, $description, $image = DEFAULT_SITE_IMAGE, $type = "website", $url = URLROOT, $site_name = SITENAME)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->type = $type;
        $this->url = $url;
        $this->site_name = $site_name;
    }
}
