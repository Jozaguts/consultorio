<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use Validator;
use Illuminate\Support\Facades\DB;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidad = Especialidad::all();
        return response()->json(['data'=>$especialidad], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {            
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:especialidades|max:255',
            'consultorio_id' => 'integer|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=> $validator->errors()], 401);
        }

        try {
            $input = $request->all();
            $especialidad = Especialidad::create($input);
            return response()->json(['success'=> 'Especialidad creada', 'data'=>$especialidad],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()],400);
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
        $especialidad = Especialidad::findorfail($id)->first();
        return response()->json(['data'=>$especialidad], 200);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'consultorio_id' => 'integer|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=> $validator->errors()], 401);
        }

        try {
            $especialidad = DB::table('especialidades')
                ->where('id', $id)
                ->update($request->all());
                return response()->json(['success'=> 'Especialidad editada', 'data'=> $especialidad], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 400);
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
            $especialidad = Especialidad::find($id)->delete();
            return response()->json(['success'=>'Especialidad borrada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()], $th->getCode());
        }
    }
}
