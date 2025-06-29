<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;

class RegisterApiController extends Controller
{
    public function index()
    {
        $users = User::with('branch:id,name,code')->get();
        return response()->json($users);
    }

    public function branch(){
        
        $branch = Branch::select('id', 'name', 'code')->where('status', 1)->get();

        if ($branch->isNotEmpty()) {
            return response()->json($branch);
        }
        return response()->json(['message' => 'No branches found'], 404);
    }
}
