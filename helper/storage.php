<?php

    class storage
    {
        protected static $directory = "../storage/";
        public static function upload($file) 
        {
            $target_file = self::$directory . basename($file["name"]);
            $temp_path = $file["tmp_name"];
            move_uploaded_file($temp_path, $target_file);
            
            return "http://localhost:8080/storage/" . basename($file["name"]);
        }
    }