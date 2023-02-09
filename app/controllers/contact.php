<?php
require_once VIEW . "misc/contact_index.php";

class Contact extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $view = new ContactIndexView(new OGPdata("Contact - " . SITENAME, "Contact us!"));
        $view->render();
    }
}
