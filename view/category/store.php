<?php
   require_once "../controller/CategoriesController.php";
   $controller = new CategoriesController();
   $controller->store($_POST);

   // var_dump($_POST);
?>