<?php
class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "ip" => $_SERVER['REMOTE_ADDR']
        ];
        $this->view('landing/index', $data);
    }
}