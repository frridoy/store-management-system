<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $branches = Branch::select('id', 'name', 'code')->where('status', 1)->get();
        return view('register.create', compact('branches'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required|in:1,2,3',
            'branch_id' => 'required|exists:branches,id',
            'status' => 'required|in:0,1',
            'personal_phone_no' => 'required|string|max:20',
            'official_phone_no' => 'required|string|max:20',
            'joining_date' => 'required|date',
            'regined_date' => 'nullable|date',
            'dob' => 'required|date',
            'sex' => 'required|in:1,2,3',
            'age' => 'required|numeric|min:18|max:60',
            'marital_status' => 'required|in:1,2',
            'present_division' => 'nullable|string|max:255',
            'present_district' => 'nullable|string|max:255',
            'present_thana' => 'nullable|string|max:255',
            'permanent_division' => 'nullable|string|max:255',
            'permanent_district' => 'nullable|string|max:255',
            'permanent_thana' => 'nullable|string|max:255',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => $request->user_type,
                'branch_id' => $request->branch_id,
                'status' => $request->status,
                'personal_phone_no' => $request->personal_phone_no,
                'official_phone_no' => $request->official_phone_no,
                'joining_date' => $request->joining_date,
                'regined_date' => $request->regined_date,
                'dob' => $request->dob,
                'sex' => $request->sex,
                'age' => $request->age,
                'marital_status' => $request->marital_status,
                'present_division' => $request->present_division,
                'present_district' => $request->present_district,
                'present_thana' => $request->present_thana,
                'permanent_division' => $request->permanent_division,
                'permanent_district' => $request->permanent_district,
                'permanent_thana' => $request->permanent_thana,
                'password' => Hash::make($request->password),
                'created_by' => Auth::id() ?? null,
            ]);

            return back()->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            Log::error('User creation error: ' . $e->getMessage());

            return back()->withErrors('Something went wrong while creating the user.')->withInput();
        }
    }
}
