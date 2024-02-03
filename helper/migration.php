<?php
    require_once "database.php";
    class Migration
    {
        public function __construct()
        {
            DB::connect();
        }
        
        public static function create_table($sql)
        {
            try
            {
                $statement = DB::$pdo->prepare($sql);
                $statement->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }