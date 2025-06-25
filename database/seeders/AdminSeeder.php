<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'user_type' => 1,
            'branch_id' => 1,
            'status' => 1,
            'personal_phone_no' => '01711111111',
            'official_phone_no' => '01888888888',
            'joining_date' => Carbon::now()->subYear()->format('Y-m-d'),
            'regined_date' => null,
            'dob' => '1999-07-06',
            'sex' => 1,
            'age' => 34,
            'marital_status' => 1,
            'present_division' => 'Dhaka',
            'present_district' => 'Dhaka',
            'present_thana' => 'Tejgaon',
            'permanent_division' => 'Dhaka',
            'permanent_district' => 'Dhaka',
            'permanent_thana' => 'Savar',
            'password' => Hash::make('password'),
            'created_by' => null,
        ]);
    }
}
