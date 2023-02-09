<?php

require_once VIEW . 'trolololo.php';

class TrollfacePL extends Controller
{
    public function index()
    {
        $view = new WeDoABitOfTrolling(new OGPdata(
            "Is that you in this screenshot? - Check this out",
            "Image posting website, video hosting and gaming related media"
        ));
        $view->render();
    }
}
