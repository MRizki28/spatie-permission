<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckPermission extends Controller
{
    public function checkPermissionAdmin(Request $request)
    {
        try {
            if ($request->user()->can('create-post')) {
                return response()->json([
                    'message' => 'Success u role admin'
                ]);
            }else{
                return response()->json([
                    'message' => 'Failed, u role not admin'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => $th->getMessage()
            ]);
        }
    }
}
