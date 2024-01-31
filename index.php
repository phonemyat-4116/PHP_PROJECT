<?php
    $stu = ["name" => "mgmg", "email" => "mgmg@gmail.com"];

    // --> METHOD 1
    // $clause = implode(", ", array_map(function($key){
    //     return "$key = :$key";
    // }, array_keys($stu)));

    $products = [
        [
            "id" => 1,
            "name" => "Addidas",
            "category_id" => 2
                
        ],
        [
            "id" => 2,
            "name" => "Nike",
            "category_id" => 1
        ],
        [
            "id" => 3,
            "name" => "LV",
            "category_id" => 2
        ]
    ];

    $categories = [
        [
            "id" => 1,
            "type" => "shoes"
        ],
        [
            "id" => 2,
            "type" => "bag",
        ]
    ];

    // for($i = 0; $i < count($products); $i++){
    //     foreach($categories as $category){
    //         if($products[$i]["category_id"] === $category["id"]){
    //             array_push($products[$i], $category);
    //         }
    //     }
    // }

    for($i = 0; $i < count($categories); $i++){
        foreach($products as $product){
            if($categories[$i]["id"] === $product["category_id"]){
                array_push($categories[$i], $product);
            }
        }
    }

    // echo json_encode($products);
    echo json_encode($categories);
    

    