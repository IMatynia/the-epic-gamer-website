<?php

class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public static ?Database $instance = null;

    private function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ";charset=utf8";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $success = False;
        $tries = 80;
        while (!$success && $tries > 0) {
            try {
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
                $success = True;
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                $tries--;
                usleep(250000);
            }
        }
        if (!$success) {
            die("Couldnt connect to data base, try refreshing the website!</br>" . $this->error);
        }
    }

    public static function create_connection(): void
    {
        Database::$instance = new Database();
    }

    public static function stop_connection(): void
    {
        Database::$instance = null;
    }

    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //Bind values
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    //Execute the prepared statement
    public function execute()
    {
        return $this->statement->execute();
    }

    //Return an array
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Return a specific row as an object
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //Get's the row count
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}