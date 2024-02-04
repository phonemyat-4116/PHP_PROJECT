<?php

    class View
    {
        public static function renderView($view, $data = [])
        {
            extract($data);
            require_once __DIR__ . "/../view/category/" . $view . ".php";
        }
    }