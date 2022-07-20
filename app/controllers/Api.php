<?php
class Api extends Controller
{
    public function __construct()
    {
        $this->tags = $this->model("tags");
        $this->articles = $this->model("articles");
    }

    public function getAllTags()
    {
        $this->view("json_display", $this->tags->getAllTags());
    }
}
