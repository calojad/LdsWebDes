<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use App\Models\MiembrOrganizacion;
use App\Models\Organizacion;
use Illuminate\Http\Request;

class MiembrOrganizacionController extends Controller
{
    public function inicio($id=0){
        $org = Organizacion::findOrFail($id);
        $miembros = Miembro::get();

        return view('crud_tablas.miembro_organizacion.index',compact('org','miembros'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($id)
    {
        return MiembrOrganizacion::leftjoin('miembro', 'miembro.id', '=', 'miembro_organizacion.miembro_id')
            ->leftjoin('miembro_llamamiento', 'miembro_llamamiento.miembro_id', '=', 'miembro.id')
            ->leftjoin('llamamiento', 'llamamiento.id', '=', 'miembro_llamamiento.llamamiento_id')
            ->select('miembro.nombre','miembro.apellido','llamamiento.nombre as llamamiento' )
            ->where('miembro_organizacion.organizacion_id',$id)
            ->get();
    }

    public function listamodal()
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
            'data' => 'min:1',
        ]);

        $miembros =$request->get('data');

        foreach ($miembros as $m){
            MiembrOrganizacion::updateOrCreate(
                ['organizacion_id' =>$request->get('id') ,'miembro_id' => $m]
            );
        }

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
        $o = Organizacion::findOrFail($id);
        $o->delete();

        return;
    }
}
