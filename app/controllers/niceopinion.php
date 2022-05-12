<?php
class NiceOpinion extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "Nice opinion"
        ];
        $this->view('hax', $data);
    }
}
