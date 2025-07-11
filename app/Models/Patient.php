<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'role',
        'cnic',
        'phone',
        'gender',
        'age',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
