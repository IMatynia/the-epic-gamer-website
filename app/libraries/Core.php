<?php

/*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */

class Core
{
    /// Default site
    protected $currentController = '';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        //print_r($this->getUrl());

        $url = $this->getUrl();

        // Look in BLL for first value
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . strtolower($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = strtolower($url[0]);
            } else {
                die("Invalid domain");
            }
            // Unset 0 Index
            unset($url[0]);
        } else {
            $this->currentController = "news";
        }

        // create a DB connection for all to use
        Database::create_connection();

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part of url

        if (isset($url[1])) {
            $url[1] = strtolower($url[1]);
            // Check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

        Database::$instance = null;
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
