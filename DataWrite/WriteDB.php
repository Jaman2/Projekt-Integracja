<?php

use Database as GlobalDatabase;

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = "";
    private $database = "projekt";

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}

class WriteDB
{
    public function write($data)
    {
        $database = new Database();
        $db = $database -> getConnection();
        $name = $data['Name'];
        $datastr = implode(",", $data["Data"]);
        $sql = "INSERT INTO data (name, data) VALUES ('" . $name . "', '" . $datastr . "')";
        if($db->query($sql) == true)
        {
            echo "saved data to DB";
        } else {
            echo "data save to DB failed: " . $db->error;
        }
        $db->close();
    }
}