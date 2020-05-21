<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index() 
    {
        try {
            $patients = Patient::all();
            return response()->json(['patients' => $patients]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }

    }

    public function show($id)
    {
        try {
            $patient = Patient::find($id);
            return response()->json(['patient' => $patient]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }

    public function store(PatientStoreRequest $request)
    {
        dd($request->all());
    }
}
