<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VitalRequest;
use App\Models\Vital;

class VitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vitals = Vital::all();
        return response()->json([
            'status'=>true,
            'data'=>$vitals,
            'message'=>'all vitals'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(VitalRequest $request)
    {
        $vital = Vital::create($request->all());
        return response()->json([
            'status'=>true,
            'data'=>$vital,
            'message'=>'vital created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vital = Vital::find($id);
        if(!is_null($vital))
        {
            return response()->json([
                'status'=>true,
                'data'=>$vital,
                'message'=>'Vital Data'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Vital not Found'
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request)
    {
        $vital = Vital::find($id);
        if(!is_null($vital))
        {
            $vital->pressure = $request->get('pressure');
            $vital->oxygene = $request->get('oxygene');
            $vital->heartbeat = $request->get('heartbeat');
            $vital->glucose = $request->get('glucose');
            $vital->temperature = $request->get('temperature');

            return response()->json([
                'status'=>true,
                'data'=>$vital,
                'message'=>'Vital Data updated Successfully'
            ]);

        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Vital not Found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vital = Vital::find($id);
        if(!is_null($vital))
        {
            $vital->delete();
            return response()->json([
                'status'=>true,
                'data'=>null,
                'message'=>'Vital deleted'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Vital not Found'
            ]);
        }
    }
}
