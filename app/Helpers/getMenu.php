<?php

use App\Models\Menu;

if (!function_exists('getMenu')) {
    function getMenu()
    {
        $menu = Menu::all();
        return $menu;
    }
}