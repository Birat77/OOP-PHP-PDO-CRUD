<?php
function connectToDB()
{
    try {
        return new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
