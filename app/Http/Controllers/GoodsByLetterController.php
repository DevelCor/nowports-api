<?php

namespace App\Http\Controllers;

use App\Models\GoodsByLetter;
use App\Models\InstructionCards;
use App\Models\Mercancia;
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
        $exist = InstructionCards::find($request->input('id_instruction_card'));
        if(!$exist)
            return response()->json( [
                'message' => 'invalid instruction card id',
            ], 400 );

        $exist = Mercancia::find($request->input('id_mercancia'));
        if(!$exist)
            return response()->json( [
                'message' => 'invalid mercancia id',
            ], 400 );

        $goods_by_letter = new GoodsByLetter([
            'id_instruction_card' => $request->input('id_instruction_card'),
            'id_mercancia' => $request->input('id_mercancia'),
            'quantity' => $request->input('quantity'),
        ]);

        $goods_by_letter->save();

        return response()->json([
            'message' => 'Created',
            'data' => $goods_by_letter
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
        $letter = GoodsByLetter::find($id);

        if(!$letter)
            return response()->json( [
                'message' => 'not found'
            ], 404 );

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
        $letter = GoodsByLetter::find($id);

        $exist = InstructionCards::find($request->input('id_instruction_card'));
        if(!$exist)
            return response()->json( [
                'message' => 'invalid instruction card id',
            ], 400 );

        $exist = Mercancia::find($request->input('id_mercancia'));
        if(!$exist)
            return response()->json( [
                'message' => 'invalid mercancia id',
            ], 400 );

        if(!$letter)
            return response()->json( [
                'message' => 'not found'
            ], 404 );

        $letter->update([
            'id_instruction_card' => $request->input('id_instruction_card') ?? $letter->id_instruction_card,
            'id_mercancia' => $request->input('id_mercancia') ?? $letter->id_mercancia,
            'quantity' => $request->input('quantity') ?? $letter->quantity,
        ]);

        return response()->json( [
            'message' => 'Updated',
            'data' => $letter
        ], 200 );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $letter = GoodsByLetter::find($id);

        if(!$letter)
            return response()->json( [
                'message' => 'not found'
            ], 404 );

        $letter->delete();

        return response()->json( [
            'message' => 'Deleted', 
        ], 200 );
    }
}
