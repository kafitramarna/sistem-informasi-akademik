<?php

use App\Models\Menu;

if (!function_exists('getMenu')) {
    function getMenu()
    {   
        if(session('role') == 'mahasiswa'){
            $menu = Menu::where('is_mahasiswa',1)->where('is_active',1)->get();
        }else if(session('role') == 'dosen'){
            $menu = Menu::where('is_dosen',1)->where('is_active',1)->get();
        }else{
            $menu = Menu::where('is_admin',1)->where('is_active',1)->get();
        }
        return $menu;
    }
}