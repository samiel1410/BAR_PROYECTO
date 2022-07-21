<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Snack;


class SnackController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $snacks = Snack::all();
        return view('snacks.index', compact('snacks'));
    }

    public function show(Request $request, Snack $snack)
    {
        return view('snacks.show', compact('snack'));
    }

    public function create()
    {
        return view('snacks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        $snack = Snack::create($data);
        return redirect()->route('snacks.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, Snack $snack)
    {
        return view('snacks.edit', compact('snack'));
    }

    public function update(Request $request, Snack $snack)
    {
        $data = $request->validated();
        $snack->fill($data);
        $snack->save();
        return redirect()->route('snacks.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, Snack $snack)
    {
        $snack->delete();
        return redirect()->route('snacks.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
