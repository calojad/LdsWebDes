<?php

namespace App\Http\Controllers;

use App\Models\Llamamiento;
use Illuminate\Http\Request;

class LlamamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Llamamiento::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
        ]);

        Llamamiento::create($request->all());

        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Llamamiento::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string'
        ]);

        $ll = Llamamiento::findOrFail($id);
        $ll->update($request->all());

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return void
     */
    public function destroy($id)
    {
        $ll = Llamamiento::findOrFail($id);
        $ll->delete();

        return;
    }
}
