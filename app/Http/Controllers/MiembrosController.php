<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Miembro[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Miembro::get();
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
            'apellido' => 'required|string',
            'email' => 'email|string|nullable',
            'telefono' => 'numeric|nullable',
            'direccion' => 'string|max:255|nullable',
            'fecha_nacimiento' => 'date|before:'.Carbon::now()->format('Y-m-d').'|nullable',
            'sexo' => 'required|string|max:1',
        ]);

        Miembro::create($request->all());

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
        return Miembro::findOrFail($id);
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
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'email|string|nullable',
            'telefono' => 'numeric|nullable',
            'direccion' => 'string|max:255|nullable',
            'fecha_nacimiento' => 'date|before:'.Carbon::now()->format('Y-m-d').'|nullable',
            'sexo' => 'required|string|max:1',
        ]);
        $miembro = Miembro::findOrFail($id);
        $miembro->update($request->all());
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
        $m = Miembro::findOrFail($id);
        $m->delete();

        return;
    }
}
