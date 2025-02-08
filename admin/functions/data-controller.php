<?php

class DataController
{
    private $connect;
    public function __construct()
    {
        require_once('includes/db.php');
        $databaseConnect = new DatabaseConnection();
        $this->connect = $databaseConnect->connect();
    }
    public function insertData($tableName, $dataToInsert)
    {
        if (isset($tableName) || !is_array($dataToInsert) || count($dataToInsert) < 1) {
            return throw new Exception('Something wrong with table name & data to insert');
        }
        $columns = implode(', ', array_keys($dataToInsert));
        $values = ':' . implode(', :', array_keys($dataToInsert));
        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";
        $stmt = $this->connect->prepare($sql);

        foreach ($dataToInsert as $key => &$value) {
            $stmt->bindParam(":$key", $value);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
