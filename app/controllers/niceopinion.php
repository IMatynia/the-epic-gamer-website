<?php
class NiceOpinion extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "ogp_data" => new OGPdata("Nice opinion", "There might be a problem with your statement...")
        ];
        $this->view('hax', $data);
    }
}
