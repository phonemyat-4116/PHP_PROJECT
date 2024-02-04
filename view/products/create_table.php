<?php
    require 'connect.php';

    $statements = [
        'CREATE TABLE IF NOT EXISTS products (
            ID INT NOT NULL AUTO_INCREMENT,
            Product VARCHAR(50) NOT NULL,
            Price INT UNSIGNED NOT NULL,
            Stock INT UNSIGNED NOT NULL,
            PRIMARY KEY (ID)
        );'
    ];

    foreach($statements as $statement){
        $pdo->exec($statement);
    }