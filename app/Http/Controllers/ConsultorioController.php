<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Consultorio;
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
        //
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
            $consultorio = Consultorio::create($input);
            return response()->json(['success' => 'Consultorio creado', 'data' => $consultorio], 201);
        } catch (\Throwable $th) {
            //throw $th;
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
        $consultorio = Consultorio::findorfail($id)->first();
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
            $consultorio = DB::table('consultorios')
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
            $consultorio = Consultorio::find($id)->delete();
            return response()->json(['success'=>'Consultorio borrado'],200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], $th->getCode());
        }
    }
}
