<?php

//class Database
//{
// private string $host = '127.0.0.1';
// private string $db_name = 'competitions';
// private string $username = 'root';
// private string $password = '';
// public PDO $conn;

// public function __construct()
// {
//     $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
// }

// public function getConnection(): PDO
// {
//     try {
//         $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
//     } catch (PDOException $exception) {
//         echo 'Ошибка соединения: ' . $exception->getMessage();
//     }

//     return $this->conn;
// }
//}

ORM::configure(array(
    'connection_string' => 'mysql:host=127.0.0.1;dbname=competitions',
    'username' => 'root',
    'password' => ''
));
