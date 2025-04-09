<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'mime', 'path', 'user_id'
    ];

    // Defining the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

