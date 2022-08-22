<?php

function get_public_methods()
{
    $methods = get_class_methods("Api");
    return array_diff($methods, ["__construct", "model", "view"]);
}

class Api extends Controller
{
    public function __construct()
    {
        $this->tags = $this->model("tags");
        $this->articles = $this->model("articles");
        $this->api_keys = $this->model("api_keys");

        if (isset($_GET["api_key"])) {
            $current_api_key = $_GET["api_key"];
        } else if (isset($_POST["api_key"])) {
            $current_api_key = $_POST["api_key"];
        } else {
            die("Api key missing! add api_key as an argument to your request");
        }

        $this->permission_granted = $this->api_keys->checkPrivilige($current_api_key);
        if (!$this->permission_granted) {
            die("Your api key ran out of requests!");
        }
    }

    public function index()
    {
        echo "The following methods are supported by the API:</br>";
        echo "> " . join("</br>> ", get_public_methods());
    }

    public function getAllTags()
    {
        $this->view("json_display", $this->tags->getAllTags());
    }

    public function addTag()
    {
        $name = $_GET["name"];
        $description = $_GET["description"];

        $this->tags->addTag($name, $description);
        die("Tag " . $name . " added!");
    }
}
