<?php
    // require 'connect.php';
    require_once '../controller/ProductController.php';
    $controller = new ProductController();
    echo $controller->update($_POST,$_GET["id"]);