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
            'message'=>'all vitals returned successfully'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(VitalRequest $request)
    {
        $user = auth()->user();
        if($user->id == $request->get('user_id'))
        {
            $vital = Vital::create($request->all());
            return response()->json([
                'status'=>true,
                'data'=>$vital,
                'message'=>'Vital Created Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'User is not authenticated'
            ]);
        }

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
                'message'=>'Vital data returned successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Vital data not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VitalRequest $request, string $id)
    {
        $user = auth()->user();

        if($user->id == $request->get('user_id'))
        {
            $vital = Vital::find($id);
            if(!is_null($vital))
            {
                $vital->update($request->all());

                return response()->json([
                    'status'=>true,
                    'data'=>$vital,
                    'message'=>'Vital data returned successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'data'=>null,
                    'message'=>'Vital data not found'
                ]);
            }
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'User is not authenticated'
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
                'message'=>'Vital deleted successfully'
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'data'=>null,
                'message'=>'Vital not found'
            ]);
        }
    }
}
