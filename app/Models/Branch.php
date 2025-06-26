<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'code',
        'location',
        'branch_manager',
        'phone_no',
        'email',
        'status',
    ];

    public function users(){
        return $this->hasMany(User::class, 'branch_id', 'id');
    }
}
