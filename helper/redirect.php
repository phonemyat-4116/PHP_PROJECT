<?php

    function redirect_Product($route){
        echo header("Location: http://localhost:8080/products/$route");
    }