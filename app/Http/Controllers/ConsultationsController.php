<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultation;
use App\Http\Requests\ConsultationStoreRequest;
use App\Http\Requests\ConsultationUpdateRequest;

class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $consultations = Consultation::all();
            return response()->json(['consultations'=>$consultations]);
        } catch (\Throwable $th) {
            return response()->json(['errors'=> $th->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultationStoreRequest $request)
    {
        try {
            $consultation = Consultation::create($request->all());
            return response()->json(['success'=>'Consulta creada', 'data'=>$consultation],201);
        } catch (\Throwable $th) {
            return response()->json(['errors'=>$th->getMessage()], 400);
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
            $consultation = Consultation::find($id);
            return response()->json(['consultation'=>$consultation]);
        } catch (\Throwable $th) {
            return response()->json(['errors'=> $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultationUpdateRequest $request, $id)
    {
        try {
            $consultation = Consultation::find($id);
            $consultation->update($request->all());
            return response()->json(['success'=>'Consulta modificada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['errors'=>$th->getMessage()]);
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
            $consultation = Consultation::find($id);
            $consultation->delete();
            return response()->json(['success'=>"La consulta ha sido eliminada"]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }
}
