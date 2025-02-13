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
        if (empty($tableName) || !is_array($dataToInsert) || count($dataToInsert) < 1) {
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

    public function deleteData($table, $where, $id)
    {
        if (empty($table) || empty($where) || empty($id)) {
            return throw new Exception('something is wrong variable $table, $where, $id');
        }

        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchData($table, $where, $orderBy)
    {
        $sql = "SELECT * FROM $table";

        // Append WHERE only if provided
        if (!empty($where)) {
            $sql .= " WHERE $where";
        }

        // Append ORDER BY only if provided
        if (!empty($orderBy)) {
            $sql .= " ORDER BY $orderBy";
        }
        $stmt = $this->connect->prepare($sql);

        if ($stmt->execute()) { // No need to pass $where in execute
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
