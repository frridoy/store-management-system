<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_code',
        'description',
        'status',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
