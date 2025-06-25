<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => 'Head Office',
            'code' => 'HO001',
            'location' => 'Dhaka',
            'branch_manager' => 'John Doe',
            'phone_no' => '01700000000',
            'email' => 'headoffice@example.com',
            'status' => 1,
        ]);
    }
}
