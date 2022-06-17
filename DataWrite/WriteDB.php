<?php
//Config of DB connection.
class Database
{
    private $host = "localhost";
    private $user = "Integracja";
    private $password = "Integracja";
    private $database = "projekt";

    public function getConnection()
    {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            $conn->query("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE");
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
        $db->begin_transaction();
        $name = $data['Name'];
        $sqlData = "INSERT INTO data("; /// work ehre
        $sql = "INSERT INTO data (name, data) VALUES ('" . $name . "', '" . $datastr . "')";
        $checkquery ="SELECT id FROM data WHERE Name = '".$name."'";
        $result = $db->query($checkquery);
        if($result->num_rows==0){
        if($db->query($sql) == true)
        {
            echo "saved data to DB";
        } else {
            echo "data save to DB failed: " . $db->error;
        }
        }
        else{
            echo "Record for country already exists";
        }
        $db->commit();
        $db->close();
    }
}