<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $config = include __DIR__ . '/../config/database.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Błąd połączenia z bazą danych: ' . $e->getMessage());
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
