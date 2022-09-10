<?php
class About extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "ogp_data" => new OGPdata("About " . SITENAME, "Info about this epic website")
        ];
        $this->view("misc/about_index");
    }
}
