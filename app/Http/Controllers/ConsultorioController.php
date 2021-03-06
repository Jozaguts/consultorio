<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConsultingRoom;
use App\Http\Requests\ConsultorioStoreRequest;
use Illuminate\Support\Facades\DB;
use Validator;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $consultorios = ConsultingRoom::all();
            return response()->json(['success'=>'ok', 'data'=> $consultorios], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()],200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultorioStoreRequest $request)
    {
        
        try {
            $input = $request->all();
            $consultorio = ConsultingRoom::create($input);
            return response()->json(['success' => 'Consultorio creado', 'data' => $consultorio], 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
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
            $consultorio = ConsultingRoom::findorfail($id)->first();
            return response()->json(['success'=>'ok', 'data'=>$consultorio], 200);
        } catch (\Throwable $th) {
            return response()->json(['success'=>'ok', 'data'=>$consultorio], 200);
        }
        
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
            'name' => 'string',
            'address' => 'string',
            'phone' => 'min:10|max:10',
            'responsable' => 'string',
            'logo' => 'string',
            'licence' => 'string|max:25',
            'web' => 'string|url',
            'twitter' => 'string',
            'facebook' => 'string',
            'instagram' => 'string',            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        try {
            $consultorio = DB::table('consulting_rooms')
                ->where('id', $id)
                ->update($request->all());
            return response()->json(['success' => 'Consultorio modificado', 'data' => $consultorio], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
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
            $consultorio = ConsultingRoom::find($id)->delete();
            return response()->json(['success'=>"El consultorio {$consultorio->name} ha sido borrado"], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], $th->getCode());
        }
    }
}
