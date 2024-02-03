<?php
    require_once __DIR__ . "/../helper/migration.php";

    Migration::create_table("
    CREATE TABLE products (
        id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        image VARCHAR(100) NOT NULL,
        price INT UNSIGNED NOT NULL,
        stock INT UNSIGNED NOT NULL,
        description TEXT NOT NULL,
        category_id INT UNSIGNED NOT NULL,
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL,
        deleted_at DATETIME
    );
    ");