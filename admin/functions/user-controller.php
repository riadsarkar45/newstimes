<?php

class UserController
{
    private $userEmail;
    private $userPassword;
    private $connect;

    public function __construct()
    {
        require_once('includes/db.php');
        $databaseConnect = new DatabaseConnection();
        $this->connect = $databaseConnect->connect();
    }

    public function setUserEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid Email Detected');
        }
        $this->userEmail = $email;
    }

    public function setUserPassword($password)
    {
        $this->userPassword = $password;
    }

    public function getUserPassword()
    {
        return $this->userPassword;
    }

    public function getUserEmail()
    {
        return $this->userEmail;
    }

    public function checkDataExistOrNot($table, $where, $checkValue)
    {
        $checkData = null;
        $sql = $this->connect->prepare("SELECT * FROM `$table` WHERE `$where` = :checkValue");
        $sql->bindParam(':checkValue', $checkValue);
        if ($sql->execute()) {
            $checkData = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $checkData;
    }

    public function isUserLoggedIn($userId)
    {
        $sql = $this->connect->prepare("SELECT * FROM users WHERE id = :userId");
        $sql->bindParam(':userId', $userId);
        if ($sql->execute()) {
            $isUserFound = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $isUserFound;
    }
}
