<?php
    $host = "localhost";
    $dbname = "phonedb";
    $user = "root";
    $password = "admin123";
    $dsn = "mysql:host=$host;dbname=$dbname";

    try{
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){
            echo "Database connection has been established </br>";
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }