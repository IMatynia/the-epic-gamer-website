<?php
class Contact extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "ogp_data" => new OGPdata("Contact - " . SITENAME, "Contact us!")
        ];
        $this->view("misc/contact_index");
    }
}
