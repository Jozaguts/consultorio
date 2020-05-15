<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Consultorio;
use App\Http\Requests\ConsultorioStoreRequest;
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
            return response()->json(['success'=> 'Consultorio creado'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()],400 );
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
        $consultorio= Consultorio::find($id);
        dd($consultorio);
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
            'name'=> 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|min:10|max:10',
            'responsable' => 'required|max:255',
            'logo' => 'required',
            'licence' => 'string|max:25',
            'web' => 'string|url',
            'twitter' => 'string',
            'facebook' => 'string',
            'instagram' => 'string',            
        ]);

        

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        try {
            $consultorio = Consultorio::find($id);
            $consultorio->name = $request->get('name');
            $consultorio->address = $request->get('address');
            $consultorio->phone = $request->get('phone');
            $consultorio->responsable = $request->get('responsable');
            $consultorio->logo = $request->get('logo');
            $consultorio->licence = $request->get('licence');
            $consultorio->web = $request->get('web');
            $consultorio->twitter = $request->get('twitter');
            $consultorio->facebook = $request->get('facebook');
            $consultorio->instagram = $request->get('instagram');
            $res =$consultorio->save();
            return response()->json(['success'=>'Consultorio modificado'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], $th->getCode());
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
