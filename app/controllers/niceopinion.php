<?php

require_once VIEW . "hax.php";

class NiceOpinion extends Controller
{
    public function index()
    {
        $view = new IHaveYourIPAdress(new OGPdata("Nice opinion", "There might be a problem with your statement..."));
        $view->render();
    }
}
