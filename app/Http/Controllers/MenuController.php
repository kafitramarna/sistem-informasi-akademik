<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $listMenu = Menu::all();
        return view('_partials.menu',[
            'listMenu' => $listMenu
        ]);
    }
}
