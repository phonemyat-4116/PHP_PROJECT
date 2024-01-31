<?php
    // require 'connect.php';
    require_once '../controller/ProductController.php';
    $_POST["image"] = $_FILES["image"];
    // die(var_dump($_POST));
    $controller = new ProductController();
    $controller->store($_POST);
    

    
    
