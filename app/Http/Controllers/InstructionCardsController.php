<?php

namespace App\Http\Controllers;

use App\Models\InstructionCards;
use App\Models\User;
use Illuminate\Http\Request;

class InstructionCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $intructionCards = InstructionCards::all();

        return response()->json( [
            'data' => $intructionCards
        ], 200 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->input('id_sender_user'));
        if(!$user)
            return response()->json( [
                'message' => 'invalid sender user',
            ], 400 );

        $user = User::find($request->input('id_receiver_user'));
        if(!$user)
            return response()->json( [
                'message' => 'invalid receiver user',
            ], 400 );


        $instructionCard = new InstructionCards([
            'id_sender_user' => $request->input('id_sender_user') ?? ' ',
            'id_receiver_user' => $request->input('id_receiver_user') ?? ' ',
            'emission_date' => $request->input('emission_date') ?? ' ',
            'reception_date' => $request->input('reception_date') ?? ' ',
            'state' => $request->input('state') ?? ' ',
        ]);

        $instructionCard->save();

        return response()->json( [
            'message' => 'Created',
            'data' => $instructionCard
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
        $instructionCard = InstructionCards::find($id);

        if ($instructionCard)
            return response()->json( [
                'data' => $instructionCard
            ], 200 );

        return response()->json( [
            'message' => 'not found'
        ], 404 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $instructionCard = InstructionCards::find($id);

        $user = User::find($request->input('id_sender_user'));
        if(!$user)
            return response()->json( [
                'message' => 'invalid sender user',
            ], 400 );

        $user = User::find($request->input('id_receiver_user'));
        if(!$user)
            return response()->json( [
                'message' => 'invalid receiver user',
            ], 400 );


        if ($instructionCard) {
            $instructionCard->update([
                'id_sender_user' => $request->input('id_sender_user') ?? $instructionCard->id_sender_user,
                'id_receiver_user' => $request->input('id_receiver_user') ?? $instructionCard->id_receiver_user,
                'emission_date' => $request->input('emission_date') ?? $instructionCard->emission_date,
                'reception_date' => $request->input('reception_date') ?? $instructionCard->reception_date,
                'state' => $request->input('state') ?? $instructionCard->state,
            ]);

            return response()->json( [
                'message' => 'Updated',
                'data' => $instructionCard
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
        $instructionCard = InstructionCards::find($id);

        if (!$instructionCard)
            return response()->json( [
                'message' => 'not found'
            ], 404 );

        $instructionCard->delete();
        return response()->json( [
            'message' => 'Deleted',
        ], 200 );
    }
}
