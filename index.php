<?php
    $stu = ["name" => "mgmg", "email" => "mgmg@gmail.com"];

    // --> METHOD 1
    // $clause = implode(", ", array_map(function($key){
    //     return "$key = :$key";
    // }, array_keys($stu)));

    function update($data)
    {
        $clause = "";
        foreach(array_keys($data) as $key)
        {
            $clause .= "$key = :$key, ";
        }
        echo $clause;
    }
    update($stu);
    