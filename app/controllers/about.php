<?php
require_once VIEW . "misc/about_index.php";

class About extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $view = new AboutIndexView(new OGPdata("About " . SITENAME, "Info about this epic website"));
        $view->render();
    }
}
