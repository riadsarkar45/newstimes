<?php 

class DatabaseConnection {
    public function connect(){
        $connect = new PDO("mysql:host=localhost; dbname=commerce", "root", "");
        return $connect;
    }
}