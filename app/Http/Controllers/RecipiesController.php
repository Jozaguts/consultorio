<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipie;
use App\Http\Requests\RecipieStoreRequest;
use App\Http\Requests\RecipieUpdateRequest;

class RecipiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $recipies= Recipie::all();
            return response()->json(['recipies' => $recipies]);
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
    public function store(RecipieStoreRequest $request)
    {
        try {
            $recipie = Recipie::create($request->all());
            return response()->json(['success'=>"Receta creada",], 201);
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
            $recipie= Recipie::find($id);
            return response()->json(['recipie' => $recipie]);
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
    public function update(RecipieUpdateRequest $request, $id)
    {
        try {
            $recipie = Recipie::find($id);
            $recipie->update($request->all());
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
            $recipie = Recipie::find($id);
            $recipie->delete();
            return response()->json(['success' => 'La receta ha sido eliminada']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }
}
