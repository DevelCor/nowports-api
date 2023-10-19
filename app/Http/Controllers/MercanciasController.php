<?php

namespace App\Http\Controllers;

use App\Models\Mercancia;
use Illuminate\Http\Request;

class MercanciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mercancias = Mercancia::all();

        return response()->json( [
            'data' => $mercancias
        ], 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Crear una nueva instancia del modelo Mercancia con los datos del formulario
        $mercancia = new Mercancia([
            'description' => $request->input('description') ?? ' ',
            'weight' => $request->input('weight') ?? ' ',
            'volume' => $request->input('volume') ?? ' ',
            'price' => $request->input('price') ?? ' ',
            'type' => $request->input('type') ?? ' ',
        ]);

        // Guardar la nueva mercancia en la base de datos
        $mercancia->save();

        return response()->json( [
            'message' => 'Created', 
            'data' => $mercancia
        ], 200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // Obtener la instancia de la mercancía por su ID
        $mercancia = Mercancia::find($id);

        if ($mercancia)
            return response()->json( [
                'data' => $mercancia
            ], 200 );

        return response()->json( [
            'message' => 'not found'
        ], 404 );
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
        // Obtener la instancia de la mercancía por su ID
        $mercancia = Mercancia::find($id);

        if($mercancia) {
            // Actualizar los datos de la mercancía con los datos del formulario
            $mercancia->update([
                'description' => $request->input('description') ?? $mercancia->description,
                'weight' => $request->input('weight') ?? $mercancia->weight,
                'volume' => $request->input('volume') ?? $mercancia->volume,
                'price' => $request->input('price') ?? $mercancia->price,
                'type' => $request->input('type') ?? $mercancia->type,
            ]);

            return response()->json( [
                'message' => 'Updated',
                'data' => $mercancia
            ], 200 );
        }

        return response()->json( [
            'message' => 'not found'
        ], 404 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener la instancia de la mercancía por su ID y eliminarla de la base de datos
        $mercancia = Mercancia::find($id);

        if ($mercancia) {
            $mercancia->delete();

            return response()->json( [
                'message' => 'Deleted',
            ], 200 );
        }
        return response()->json( [
            'message' => 'not found'
        ], 404 );
    }
}
