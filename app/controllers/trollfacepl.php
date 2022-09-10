<?php

class TrollfacePL extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "page_title" => "We do a bit of trolling",
            "ogp_data" => new OGPdata(
                "Is that you in this screenshot? - Check this out",
                "Image posting website, video hosting and gaming related media"
            )
        ];
        $this->view('trolololo', $data);
    }
}
