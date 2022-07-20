<?php
class TrollfacePL extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "We do a bit of trolling"
        ];
        $this->view('trolololo', $data);
    }
}
