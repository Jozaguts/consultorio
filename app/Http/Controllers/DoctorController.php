<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Validator;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $doctores = Doctor::all();
            return response()->json(['success'=>'ok', 'data'=> $doctores], 200);
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
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'user_id'=> 'required' ,
            'consulting_room_id'=> 'required' ,
            'specialtie_id'=> 'required' ,
            'phone'=> 'numeric|digits:10' ,
            'mobile_phone'=> 'numeric|digits:10' ,
            'whatsapp'=> 'numeric|digits:10' ,
            'address'=> 'max:255' ,
            'identification_card'=> 'required' ,
            'birth_date'=> 'date' ,
            'studies'=> 'required' ,
            'observations'=> '' , 
        ]);    

        if ($validator->fails()) {
            return response()->json(['error'=> $validator->errors()],201);
        }

        try {
            $input = $request->all();
            $doctor = Doctor::create($input);
        
            return response()->json(['success'=> 'Doctor creado', 'data'=>$doctor], 201);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 400);
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
            $doctor = Doctor::findorfail($id)->first();
            return response()->json(['success'=>'ok', 'data'=> $doctor], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()],400);
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
            'user_id'=> 'required' ,
            'consulting_room_id'=> 'required' ,
            'specialtie_id'=> 'required' ,
            'phone'=> 'numeric|digits:10' ,
            'mobile_phone'=> 'numeric|digits:10' ,
            'whatsapp'=> 'numeric|digits:10' ,
            'address'=> 'max:255' ,
            'identification_card'=> 'required' ,
            'birth_date'=> 'date' ,
            'studies'=> 'required' ,
            'observations'=> '' , 
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=> $validator->errors()],201);
        }

        try {
            $doctor = DB::table('doctors')   
                    ->where('id', $id)
                    ->update($request->all());
        
            return response()->json(['success'=> 'Doctor modificado', 'data'=>$doctor], 201);
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
            $consultorio = Doctor::find($id)->delete();
            return response()->json(['success'=>'Doctor borrado'],200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], $th->getCode());
        }        
    }
}
