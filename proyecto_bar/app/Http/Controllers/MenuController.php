<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;


class MenuController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function show(Request $request, Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        $menu = Menu::create($data);
        return redirect()->route('menus.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $data = $request->validated();
        $menu->fill($data);
        $menu->save();
        return redirect()->route('menus.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
