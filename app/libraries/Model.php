<?php

class Model
{

}

class DBModel extends Model
{
    public Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}