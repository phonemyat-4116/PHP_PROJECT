<?php
    require_once '../controller/RecycleBinController.php';
    $controller = new RecycleBinController();
    $controller->destroy($_GET["id"]);

?>

    