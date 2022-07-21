<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buzon;


class BuzonController extends Controller
{

    public function index()
    {
        $buzons = Buzon::all();
        return view('buzons.index', compact('buzons'));
    }

    public function show(Request $request, Buzon $buzon)
    {
        return view('buzons.show', compact('buzon'));
    }

    public function create()
    {
        return view('buzons.create');
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        $buzon = Buzon::create($data);
        return redirect()->route('buzons.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Buzon $buzon)
    {
        return view('buzons.edit', compact('buzon'));
    }

    public function update(Request $request, Buzon $buzon)
    {
        $data = $request->validated();
        $buzon->fill($data);
        $buzon->save();
        return redirect()->route('buzons.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Buzon $buzon)
    {
        $buzon->delete();
        return redirect()->route('buzons.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
