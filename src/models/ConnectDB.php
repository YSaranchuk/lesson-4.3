<?php
namespace models;
abstract class ConnectDB
{
    protected $host = 'localhost';
    protected $dbname = 'mydz';
    protected $dbuser = 'root';
    protected $dbpassword = '';
    protected function connectToDb()
    {
        try {
            $pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->dbuser, $this->dbpassword, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);
        } catch (\PDOException $e) {
            die('Произошла ошибка, не удалось установить соединение с базой');
        }
        return $pdo;
    }
    // Отправка запроса
    protected function sendQueryToDb($pdo, $query, $queryParams = [])
    {
        $statement = $pdo->prepare($query);
        try {
            $statement->execute($queryParams);
        } catch (\PDOException $e) {
            die('Произошла ошибка, не удалось выполнить запрос');
        }
        return $statement;
    }
}
