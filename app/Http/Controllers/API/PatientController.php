<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return response()->json([
            'status'=>true,
            'data'=>$patients,
            'mesage'=>'list of patients'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        $patient = Patient::create($request->all());
        return response()->json([
            'status'=>true,
            'data'=>$patient,
            'message'=>'Patient Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        if($patient)
        {
            return response()->json([
                'status'=>true,
                'data'=>$patient,
                'message'=>'Patient information'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Patient not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, string $id)
    {
        $patient = Patient::find($id);
        $patient = $patient->update($request->all());
        return response()->json([
            'status'=>true,
            'data'=>$patient,
            'message'=>'Patient Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Patient::destroy($id);
        if($result)
        {
            return response()->json([
                'status'=>true,
                'data'=>null,
                'message'=>'Patient deleted Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Patient not found'
            ]); 
        }
    }
}
