<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soci;

class SociController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    // Obtener el valor del parámetro "ordenar_per" del objeto Request
    $ordenarPor = $request->input('ordenar_per', 'Codi');

    // Inicializar la consulta
    $query = Soci::query();

    // Verificar si se proporcionó un valor para buscar por código
    if ($request->has('codi_search')) {
        $query->where('Codi', 'like', '%' . $request->codi_search . '%');
    }

    // Verificar si se proporcionó un valor para buscar por apellidos (cognombres)
    if ($request->has('cognoms_search')) {
        $query->where('Cognoms', 'like', '%' . $request->cognoms_search . '%');
    }

    // Ordenar los resultados según la columna seleccionada
    if ($ordenarPor === 'Codi') {
        // Ordenar por código como numérico
        $query->orderByRaw("CAST(Codi AS UNSIGNED)");
    } else {
        // Ordenar por nombre o cognombre como texto
        $query->orderBy($ordenarPor);
    }

    // Obtener los socios según la consulta construida
    $socis = $query->get();

    return view('socis.index', compact('socis'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codi' => 'required|unique:socis',
            'Cognoms' => 'required',
            'Nom' => 'required',
            'DNI' => 'required|unique:socis',
            'Poblacio' => 'required',
            'CodiPostal' => 'required',
            'Adreca' => 'required',
        ]);

        Soci::create($request->all());

        return redirect()->route('socis.index')
            ->with('success', 'Soci creat correctament');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soci = Soci::find($id);
        return view('socis.edit', compact('soci'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Cognoms' => 'required',
            'Nom' => 'required',
            'DNI' => 'required',
            'Poblacio' => 'required',
            'CodiPostal' => 'required',
            'Adreca' => 'required',
        ]);

        $soci = Soci::find($id);
        $soci->update($request->all());

        return redirect()->route('socis.index')
            ->with('success', 'Soci actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Soci::destroy($id);
        return redirect()->route('socis.index')
            ->with('success', 'Soci eliminat correctament');
    }
}
