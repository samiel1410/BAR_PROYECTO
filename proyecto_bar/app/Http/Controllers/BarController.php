<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bar;


class BarController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $bars = Bar::all();
        return view('bars.index', compact('bars'));
    }

    public function show(Request $request, Bar $bar)
    {
        return view('bars.show', compact('bar'));
    }

    public function create()
    {
        return view('bars.create');
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        $bar = Bar::create($data);
        return redirect()->route('bars.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Bar $bar)
    {
        return view('bars.edit', compact('bar'));
    }

    public function update(Request $request, Bar $bar)
    {
        $data = $request->validated();
        $bar->fill($data);
        $bar->save();
        return redirect()->route('bars.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Bar $bar)
    {
        $bar->delete();
        return redirect()->route('bars.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}