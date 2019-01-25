<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = "Applicants";

function createDB($conn, $dbname) {
    /** @var $conn PDO */
    $sql = "CREATE DATABASE if not exists $dbname";
    $conn->exec($sql);
    $conn->exec("use $dbname");
}

function createTable($conn, $dbname) {
    $sql = "CREATE TABLE if not exists $dbname (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP
                )";

    $conn->exec($sql);
//    $conn->exec("DROP TABLE $dbname");
}


$dsn = "mysql:host=$host;charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$conn = new PDO($dsn, $user, $pass, $opt);

createDB($conn, $dbname);
createTable($conn, "COUNTRIES");