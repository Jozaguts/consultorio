<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Validator;
use Illuminate\Support\Facades\DB;
class ScheduleController extends Controller
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
            $shedules = Schedule::all();
            return response()->json(['success'=> 'ok', 'data'=>$shedules], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 200);
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
            'doctor_id' => 'required',
            'consulting_room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()],400);
        }

        try {
            $input = $request->all();
            $schedule= Schedule::create($input);           
            return response()->json(['success'=>'horario creado', 'data'=>$schedule], 201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()], 400);
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
            $shedule = Schedule::findorfail($id)->first();
            return response()->json(['success'=> 'ok', 'data'=>$shedule], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], 400);
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
            'doctor_id' => 'required',
            'consulting_room_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()],400);
        }

        try {
            $schedule = DB::table('schedules')
                    ->where('id', $id)
                    ->update($request->all());
            return response()->json(['success'=>'horario modificado', 'data'=>$schedule], 200);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th->getMessage()], 400);
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
            $schedule = Schedule::find($id)->delete();
            return response()->json(['success'=>'Horario borrado'],200);
        } catch (\Throwable $th) {
            return response()->json(['error'=> $th->getMessage()], $th->getCode());
        }     
    }
}
