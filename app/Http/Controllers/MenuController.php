<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(12);
        return view('pages.menu', ['menus' => $menus]);
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('pages.menu-detail', ['menu' => $menu]);
    }
}
