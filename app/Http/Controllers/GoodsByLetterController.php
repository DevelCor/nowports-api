<?php

namespace App\Http\Controllers;

use App\Models\GoodsByLetter;
use Illuminate\Http\Request;

class GoodsByLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        var_dump('goodsbyleter');

        $goodsbyletter = GoodsByLetter::all();

        return response()->json( [
            'data' => $goodsbyletter
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $letter = GoodsByLetter::findOrFail($id);

        return response()->json( [
            'data' => $letter
        ], 200 );
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
        //
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
        $letter = GoodsByLetter::findOrFail($id);
        $letter->delete();

        return response()->json( [
            'message' => 'Deleted', 
        ], 200 );
    }
}
