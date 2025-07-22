<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{

     public function appointment_type(){
        return $this->hasMany(Appointment::class);
    }
    
    use HasFactory;
}
