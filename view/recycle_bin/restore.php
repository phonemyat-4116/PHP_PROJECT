<?php
    require_once "../controller/RecycleBinController.php";
    require_once "../helper/model.php";
    $controller = new RecycleBinController();
    $controller->restore($_GET['id']);