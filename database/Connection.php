<?php
class Connection
{
    public static function make()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connection created";
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
