<?php
    $info = array(
        "server" => "localhost", 
        "login" => "root", 
        "password" => "", 
        "dbname" => "db_vedita"
    );
    try {
        $pdo = new PDO("mysql:host={$info["server"]};dbname={$info["dbname"]}", "{$info["login"]}", "{$info["password"]}");
        //echo "Успешное подключение к базе данных <br>";
    }
    catch (PDOException $e) {
        echo "Ошибка подключения к базе данных: " . $e->getMessage() . "<br>";
    }
    return $pdo;
?>