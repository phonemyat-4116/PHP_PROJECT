<?php
    class DB{
        protected static $host = "localhost";
        protected static $dbname = "first";
        protected static $user = "root";
        protected static $password = "admin123";
        public static $pdo;

        public static function connect()
        {
            try{
                $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo = $pdo;
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }