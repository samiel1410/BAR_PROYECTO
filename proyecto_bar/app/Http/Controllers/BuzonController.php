<?php

namespace App\Http\Controllers;

use App\Models\Buzon;
use Illuminate\Http\Request;

/**
 * Class BuzonController
 * @package App\Http\Controllers
 */
class BuzonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buzons = Buzon::paginate();

        return view('buzon.index', compact('buzons'))
            ->with('i', (request()->input('page', 1) - 1) * $buzons->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buzon = new Buzon();
        return view('buzon.create', compact('buzon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Buzon::$rules);

        $buzon = Buzon::create($request->all());

        return redirect()->route('buzons.index')
            ->with('success', 'Buzon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buzon = Buzon::find($id);

        return view('buzon.show', compact('buzon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buzon = Buzon::find($id);

        return view('buzon.edit', compact('buzon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Buzon $buzon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buzon $buzon)
    {
        request()->validate(Buzon::$rules);

        $buzon->update($request->all());

        return redirect()->route('buzons.index')
            ->with('success', 'Buzon updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $buzon = Buzon::find($id)->delete();

        return redirect()->route('buzons.index')
            ->with('success', 'Buzon deleted successfully');
    }
}
