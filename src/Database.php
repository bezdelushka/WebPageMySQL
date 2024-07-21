<?php
class Database {
    private $host = "mysql_db";
    private $username = "root";
    private $password = "toor";
    private $dbname = "login_db";
    public $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli($this->host, $this->username, $this->password);

        if ($this->mysqli->connect_errno) {
            die("Connection error: " . $this->mysqli->connect_error);
        }

        $sql = 'CREATE DATABASE IF NOT EXISTS ' . $this->dbname;
        if (mysqli_query($this->mysqli, $sql)) {
            mysqli_select_db($this->mysqli, $this->dbname);
            $this->createTables();
        }
    }

    private function createTables() {
        $userTable = 'CREATE TABLE IF NOT EXISTS Users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            pass_hash VARCHAR(255) NOT NULL
        )';

        $imgTable = 'CREATE TABLE IF NOT EXISTS Img (
            id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            name VARCHAR(250) NOT NULL,
            mime VARCHAR(255) NOT NULL,
            data LONGBLOB NOT NULL
        )';

        mysqli_query($this->mysqli, $userTable);
        mysqli_query($this->mysqli, $imgTable);
    }
}