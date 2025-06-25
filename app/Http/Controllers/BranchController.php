<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BranchController extends Controller
{
    public function create(){
        return view('branches.create');
    }

    public function store(Request $request){

     $validate = $request->validate([
         'name' => 'required',
         'code' => 'required',
         'location' => 'required',
         'branch_manager' => 'required',
         'phone_no' => 'required',
         'email' => 'required|email',
         'status' => 'required',
     ]);

     try{

        $branch = Branch::create([
            'name' => $request->name,
            'code' => $request->code,
            'location' => $request->location,
            'branch_manager' => $request->branch_manager,
            'phone_no' => $request->phone_no,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return redirect()->route('branches.create')->with('success', 'Branch created successfully.');

     }catch (\Exception $e){
        Log::error('An error occurred for Store Branch: ' . $e->getMessage());
        return back()->withErrors('Something went wrong while creating the branch.')->withInput();

     }

    }
}
