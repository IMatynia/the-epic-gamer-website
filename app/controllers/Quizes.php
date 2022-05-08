<?php
class Quizes extends Controller
{
    public function __construct()
    {
    }

    public function index() /// List all quizes
    {
        $data = [
            "ip" => $_SERVER['REMOTE_ADDR']
        ];
        $this->view('landing/index', $data);
    }
}