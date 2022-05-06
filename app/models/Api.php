<?php
class Api
{
    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}