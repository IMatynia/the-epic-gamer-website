<?php

require_once MODEL . "articles.php";
require_once MODEL . "tags.php";
require_once MODEL . "quizes.php";
require_once MODEL . "api_keys.php";
require_once MODEL . "authors.php";

require_once VIEW . "json_display.php";

function get_public_methods(mixed $obj)
{
    $methods = get_class_methods($obj);
    return array_diff($methods, ["__construct", "model", "view"]);
}

class Api extends Controller
{
    public array $models;
    public bool $permission_granted;

    public function __construct()
    {
        $api_keys = new Api_keys();

        $this->models = [
            "articles" => new Articles(),
            "tags" => new Tags(),
            "quizes" => new Quizes(),
            "authors" => new Authors()
        ];

        if (isset($_GET["api_key"])) {
            $current_api_key = $_GET["api_key"];
        } else {
            die("Api key missing! add api_key as an argument to your request");
        }

        $this->permission_granted = $api_keys->checkPriviliges($current_api_key);
        if (!$this->permission_granted) {
            die("Api key expired!");
        }
    }

    public function index($function)
    {
        $res = explode(".", $function);
        $model = $res[0];
        $method = $res[1];
        $params = $_GET;
        unset($params["url"], $params["api_key"]);

        try {
            $ret = call_user_func_array(array($this->models[$model], $method), $params);
        } catch (TypeError $er) {
            echo $er . "</br>";
            $this->list_funcs();
            return;
        }

        $view = new JSONView($ret);
        $view->render();
    }

    public function list_funcs()
    {
        echo "Usage: " . URLROOT . "api/[model_name].[method name]</br>";
        ?>
        <ol>
            <?php foreach ($this->models as $model_name => $model) { ?>
                <li>Model [<?php echo $model_name; ?>]
                    <ul>
                        <?php
                        echo "<li>" . join("</li><li>", get_public_methods($model)) . "</li>";
                        ?>
                    </ul>
                </li>
            <?php } ?>
        </ol> <?php
    }

}
