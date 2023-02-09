<?php

require_once(MODEL . "api_keys.php");

require_once(VIEW . "json_display.php");

class Test extends Controller
{
    private Api_keys $api_keys;

    public function __construct()
    {
        $this->api_keys = new Api_keys();
    }

    public function index()
    {
        ?>
        <h1>
            Testing ground. Nothing to see here :)
        </h1>
        <?php
    }
}