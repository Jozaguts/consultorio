<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Patient;

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
        try {
            $patient = Patient::create($request->all());
            return response()->json(['success' => "Paciente {$patient->first_name} {$patient->last_name} ha sido registrado"],201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()],400);
        }
    }

    public function update(PatientUpdateRequest $request, $id)
    {
        try {
            $patient = Patient::find($id);
            $patient->update($request->all());
            return response()->json(['success' => "El paciente {$patient->first_name} {$patient->last_name} ha sido actualizado"],201);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $patient = Patient::find($id);
            $patient->delete();
            return response()->json(['success' => "El Paciente {$patient->first_name} {$patient->last_name} ha sido eliminado"]);
        } catch (\Throwable $th) {
            return response()->json(['errors' => $th->getMessage()]);
        }
    }
}
