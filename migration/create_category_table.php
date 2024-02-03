<?php
    require_once __DIR__ . "/../helper/migration.php";

    Migration::create_table("
    CREATE TABLE category (
        id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL
   );
    ");