<?php

namespace App\Http\Controllers;

use App\CashOut;
use App\Http\Requests\CashOutStoreRequest;
use App\Http\Requests\CashOutUpdateRequest;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cash_outs = CashOut::all();
            return response()->json(['cash_outs' => $cash_outs]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
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
    public function store(CashOutStoreRequest $request)
    {
        try {
            $cash_out = CashOut::create($request->all());
            return response()->json(['success' => 'Corte registrado', 'corte' => $cash_out], 201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $cash_out =  CashOut::find($id);
            return response()->json(['cash_out' => $cash_out], 200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
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
    public function update(CashOutUpdateRequest $request, $id)
    {
        try {
            $cash_out = CashOut::find($id);
            $cash_out->update($request->all());
            return response()->json(['success' => 'Corte de caja actualizado','cash_out' => $cash_out],200);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
         $cash_out =  CashOut::find($id);
         $cash_out->delete();
            return response()->json(['success'=> "Corte de caja {$cash_out->id} ha sido elimino"]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }
}
