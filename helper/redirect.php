<?php

    function redirect_Product($route){
        echo header("Location: http://localhost:8080/products/$route");
    }

    function redirect_Category($route){
        echo header("Location: http://localhost:8080/category/$route");
    }

    function redirect_Recycle($route){
        echo header("Location: http://localhost:8080/recycle_bin/$route");
    }