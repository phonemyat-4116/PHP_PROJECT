<?php
    class DB{
        public $host = "localhost";
        public $dbname = "first";
        public $user = "root";
        public $password = "admin123";
        public $pdo;

        public function __construct()
        {
            try{
                $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        }
    }