<?php
    require_once "database.php";

    class Model
    {
        function __construct()
        {
            DB::connect();
        }

        public function all(){
            return DB::$pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_OBJ);
        }
    }

    $model = new Model();
    var_dump($model->all());