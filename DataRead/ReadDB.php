<?php
//Takes nothing, reads from database with config in file WriteDB.php.
class Read
{
    private $dataTable = "data";
    private $countryTable = "country";
    public $id;
    public $name;
    public $data;

    public function __construct($db)
    {
        $this->conn = $db;

    }

    function read()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->countryTable); ///zmiany
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

class ReadDataDB
{
    public function ReadData()
    {
        $database = new Database();
        $db = $database->getConnection();
        $db->begin_transaction();
        $dataDB = new Read($db);
        $dataDB->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';
        $result = $dataDB->read();
        $db->commit();
        if ($result->num_rows > 0) {
            $dataRecords = array();
            $dataRecords["countries"] = array();
            while ($row = $result->fetch_assoc()) {
                extract($row);
                $DataDetails = array("Name" => $Name, "Data" => explode(",", $Data));
                array_push($dataRecords["countries"], $DataDetails);
            }
            http_response_code(200);
            return $dataRecords["countries"];
        } else {
            http_response_code(404);
            return "error";
        }
    }
}
