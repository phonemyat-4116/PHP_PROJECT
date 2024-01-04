<?php
    // require 'connect.php';
    // die(var_dump($_POST));
    require_once '../controller/ProductController.php';
    $controller = new ProductController();
    $controller->store($_POST);
    

    
    
