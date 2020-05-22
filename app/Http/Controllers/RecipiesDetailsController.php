<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecipieDetails;
use App\Http\Requests\RecipieDetailStoreRequest;
use App\Http\Requests\RecipieDetailUpdateRequest;

class RecipiesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $recipiesdets = RecipieDetails::all();
            return response()->json(['recipiesdets' => $recipiesdets]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipieDetailStoreRequest $request)
    {
        try {
            $recipiesdet = RecipieDetails::create($request->all());
            return response()->json(['success'=>"Detalle de receta creada", 'data'=>$recipiesdet], 201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
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
            $recipiesdet = RecipieDetails::find($id);
            return response()->json(['recipiesdet' => $recipiesdet]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipieDetailUpdateRequest $request, $id)
    {
        try {
            $recipiesdet = RecipieDetails::find($id);
            $recipiesdet->update($request->all());
            return response()->json(['success' => 'La receta se modifico satisfactoriamente'],200);
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
            $recipiesdet = RecipieDetails::find($id);
            $recipiesdet->delete();
            return response()->json(['success' => 'El detalle de la receta ha sido eliminada']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }
}
